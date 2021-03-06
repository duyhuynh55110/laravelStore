.
if (this.module) {
  module.exports = Promise;
}

// PromiseWalker

/**
 * This singleton object invokes the handlers registered on resolved and
 * rejected promises, ensuring that processing is not recursive and is done in
 * the same order as registration occurred on each promise.
 *
 * There is no guarantee on the order of execution of handlers registered on
 * different promises.
 */
this.PromiseWalker = {
  /**
   * Singleton array of all the unprocessed handlers currently registered on
   * resolved or rejected promises.  Handlers are removed from the array as soon
   * as they are processed.
   */
  handlers: [],

  /**
   * Called when a promise needs to change state to be resolved or rejected.
   *
   * @param aPromise
   *        Promise that needs to change state.  If this is already resolved or
   *        rejected, this method has no effect.
   * @param aStatus
   *        New desired status, either STATUS_RESOLVED or STATUS_REJECTED.
   * @param aValue
   *        Associated resolution value or rejection reason.
   */
  completePromise(aPromise, aStatus, aValue) {
    // Do nothing if the promise is already resolved or rejected.
    if (aPromise[N_INTERNALS].status != STATUS_PENDING) {
      return;
    }

    // Resolving with another promise will cause this promise to eventually
    // assume the state of the provided promise.
    if (aStatus == STATUS_RESOLVED && aValue &&
        typeof(aValue.then) == "function") {
      aValue.then(this.completePromise.bind(this, aPromise, STATUS_RESOLVED),
                  this.completePromise.bind(this, aPromise, STATUS_REJECTED));
      return;
    }

    // Change the promise status and schedule our handlers for processing.
    aPromise[N_INTERNALS].status = aStatus;
    aPromise[N_INTERNALS].value = aValue;
    if (aPromise[N_INTERNALS].handlers.length > 0) {
      this.schedulePromise(aPromise);
    } else if (Cu && aStatus == STATUS_REJECTED) {
      // This is a rejection and the promise is the last in the chain.
      // For the time being we therefore have an uncaught error.
      let id = PendingErrors.register(aValue);
      let witness =
          FinalizationWitnessService.make("promise-finalization-witness", id);
      aPromise[N_INTERNALS].witness = [id, witness];
    }
  },

  /**
   * Sets up the PromiseWalker loop to start on the next tick of the event loop
   */
  scheduleWalkerLoop() {
    this.walkerLoopScheduled = true;

    // If this file is loaded on a worker thread, DOMPromise will not behave as
    // expected: because native promises are not aware of nested event loops
    // created by the debugger, their respective handlers will not be called
    // until after leaving the nested event loop. The debugger server relies
    // heavily on the use promises, so this could cause the debugger to hang.
    //
    // To work around this problem, any use of native promises in the debugger
    // server should be avoided when it is running on a worker thread. Because
    // it is still necessary to be able to schedule runnables on the event
    // queue, the worker loader defines the function setImmediate as a
    // per-module global for this purpose.
    //
    // If Cu is defined, this file is loaded on the main thread. Otherwise, it
    // is loaded on the worker thread.
    if (Cu) {
      let stack = Components_ ? Components_.stack : null;
      if (stack) {
        DOMPromise.resolve().then(() => {
          Cu.callFunctionWithAsyncStack(this.walkerLoop.bind(this), stack,
                                        "Promise");
        });
      } else {
        DOMPromise.resolve().then(() => this.walkerLoop());
      }
    } else {
      setImmediate(this.walkerLoop);
    }
  },

  /**
   * Schedules the resolution or rejection handlers registered on the provided
   * promise for processing.
   *
   * @param aPromise
   *        Resolved or rejected promise whose handlers should be processed.  It
   *        is expected that this promise has at least one handler to process.
   */
  schedulePromise(aPromise) {
    // Migrate the handlers from,��    	       �\                      ������    ������           	   ntp_.size       �    S�      l�  ��   @ �	�=�    
        ~ �(��       ��       
I����        ��       ��     �           @   �(  &�(�&�V���    ,��    	       �\                      ������    ������           	   ntp_.keys       �    �      ��  ��   @ �	�>�    
        ~ �0��    &   ��       
I!
Ia
��/���        ��       ��*
      �         