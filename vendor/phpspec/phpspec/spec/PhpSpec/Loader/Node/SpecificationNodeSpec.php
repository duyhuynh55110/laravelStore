ng a rejected
 *       promise for the value of aReason would make the rejection reason
 *       equal to the rejected promise itself, and not its rejection reason.
 */
Promise.reject = function(aReason) {
  return new Promise((_, aReject) => aReject(aReason));
};

/**
 * Returns a promise that is resolved or rejected when all values are
 * resolved or any is rejected.
 *
 * @param aValues
 *        Iterable of promises that may be pending, resolved, or rejected. When
 *        all are resolved or any is rejected, the returned promise will be
 *        resolved or rejected as well.
 *
 * @return A new promise that is fulfilled when all values are resolved or
 *         that is rejected when any of the values are rejected. Its
 *         resolution value will be an array of all resolved values in the
 *         given order, or undefined if aValues is an empty array. The reject
 *         reason will be forwarded from the first promise in the list of
 *         given promises to be rejected.
 */
Promise.all = function(aValues) {
  if (aValues == null || typeof(aValues[Symbol.iterator]) != "function") {
    throw new Error("Promise.all() expects an iterable.");
  }

  return new Promise((resolve, reject) => {
    let values = Array.isArray(aValues) ? aValues : [...aValues];
    let countdown = values.length;
    let resolutionValues = new Array(countdown);

    if (!countdown) {
      resolve(resolutionValues);
      return;
    }

    function checkForCompletion(aValue, aIndex) {
      resolutionValues[aIndex] = aValue;
   