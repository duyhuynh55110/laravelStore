 ( (   �  �   , �����$  �   0 
   �  �        �$  �        �  �   $    L  �   ( (   �  �   , *   �$  �   0 �����$  �        �$  �        �  �   $    L  �   ( (   �  �   , *   �$  �   0 +   �$  �   4 �����$  �        �$  �        �  �   $    L  �   ( (   �  �   , �����$  �        �$  �        �  �   $    L  �   ( (   �  �   , �����$  �   0 +   2  �   4 ,   "-  �   8 -   G"  �        �$  �        �  �   $    L  �   ( (   �  �   , �����$  �   0 )   R"  �        �+  �         �+  �   $    �  �   (    �	  �   ,    �,  �   0    �&  �   4       �   8       �   <    -  �   @    -  �       &-  �        3-  �   $    C-  �   (    R-  �      `L  �      `�  �   $     �  �   (     �  �   ,  `d-  �   0  `,  �   4  `r-  �   8  `x-  �   <  `�-  �   @ 	 `�-  �   D 
 `�-  �   H  `�-  �   L  `�-  �   P  `�-  �   T  `�-  �   X  `�-  �   \  `�-  �   `  `.  �   d  `�  �   h  `�  �      `L  �      `�  �   $     �$  �   (  `�  �   , �����$  �   0  `.  �   4  `.  �      `�	  �      `�  �   $  `1  �   (  `.  �   ,  ` .  �   0  `-.  �   4  `-.  �   8  `5.  �   <  `�  �   @ 	 `  �   D 
 `I.  �      `L  �      `�  �   $     �$  �   (  `�  �   , �����$  �   0  `V.  �   4  `,  �   8  `�$  �      `�	  �      `�  �   $  `�  �   (  `�&  �   ,  `  �   0  `  �   4  `b.  �   8  `k.  �   <  `s.  �   @ 	 `c*  �   D 
 `�+  �   ��    �*  �   ��   �*  �      `L        `�      $     �$  �   (  `�  �   , �����$          �	          �     $    �     (    c*     ,    |.     0    �.     4    �.  	   8    �+  
   <    �+     @    �     D    �     H 	   �     L 	   �     P 
   �.     T 
   �.     X    �.     \    �.     `    �.     d    �.     h    �.     l    �.     p    �.     t    �.     x    �.     |    �.     �    �.     �    �.     �    �.     �    �.     �    �   !   �    �       ��   �.  "   ��   �.  #   ��   	/  $   8 �  �  %        `/  &      `�  '      `/  (      `�'  )      `%/  *      `+/  +      `1/  ,      `$(  -       `6/  .   $ 	  `</  /   ( 
  `@/  0   ,   `O&  1   0   `=(  2   4   `D/  3   8   `H/  4   <   `L/  5   @   `R/  6   D   `Y/  7   H   `]/  8   L   `b/  9   P   `�   :   T   `j/  ;   X   `P!  <   \   `q/  =   `   `y/  >   d   `�/  ?   h   `�/  @        �'  B         �'  A   $  `�/  D   (  `�/  C   ,  `�+  F   0  `�+  E   4  `�  G   8  `�  H   <  `�/  J   @  `�/  I   D 
 `�/  K   H  `2  L   L  `�/  M        �$  R        �$  N   $    �  O   (    �$  P   , �����$  Q       +  S        q+  T       +  U        q+  V   $    �/  X   (    �/  W        �$  ^        �  Y   $    �$  Z   (    2  [   ,    �$  \   0 �����$  ]       2  _        �  `   $    �  a   (    �  b   ,    �  c    C����  s     B����/  r   $ A����  q   ( @����  p   , ?����/  o   0 >����/  n   4 =����/  m   8 <����/  l   < ;����/  k   @ :����/  j   D 9���0  i   H 8���0  h   L 7��� 0  g   P 6���10  f   T *����  e   X $����  d       �  v         �$  u   $ �����$  t       �  y         �$  x   $ �����$  w   (    C0  {   ,    C0  z       �  ~         �$  }   $ �����$  |       �  �         �$  �   $ �����$         V0  �         �  �   $     �  �   (    �  �   ,    �  �   0    c0  �   4    c0  �   8    r0  �   <    0  �   @    �  �   D    �  �   H    �  �   L    �  �   P    �  �   T    �  �        �  �  andReturn("250 SIZE=123456\r\n");

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('afterEhlo')
             ->once()
             ->with($smtp);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('afterEhlo')
             ->zeroOrMoreTimes()
             ->with($smtp);
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('afterEhlo')
             ->never()
             ->with($smtp);
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
    }

    public function testExtensionsCanModifyMailFromParams()
    {
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher();
        $smtp = new EsmtpTransportFixture($buf, array(), $dispatcher);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('me@domain' => 'Me'));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => null));

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .*?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM: <me@domain> FOO ZIP\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO: <foo@bar>\r\n")
            ->andReturn(3);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(3)
            ->andReturn("250 OK\r\n");
        $this->_finishBuffer($buf);

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('getMailParams')
             ->once()
             ->andReturn('FOO');
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(-1);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('getMailParams')
             ->once()
             ->andReturn('ZIP');
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(1);
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('getMailParams')
             ->never();

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
        $smtp->send($message);
    }

    public function testExtensionsCanModifyRcptParams()
    {
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher();
        $smtp = new EsmtpTransportFixture($buf, array(), $dispatcher);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('me@domain' => 'Me'));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => null));

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .+?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM: <me@domain>\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO: <foo@bar> FOO ZIP\r\n")
            ->andReturn(3);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(3)
            ->andReturn("250 OK\r\n");
        $this->_finishBuffer($buf);

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('getRcptParams')
             ->once()
             ->andReturn('FOO');
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(-1);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('getRcptParams')
             ->once()
             ->andReturn('ZIP');
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(1);
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('getRcptParams')
             ->never();

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
        $smtp->send($message);
    }

    public function testExtensionsAreNotifiedOnCommand()
    {
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .+?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("FOO\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("250 Cool\r\n");
        $this->_finishBuffer($buf);

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('onCommand')
             ->once()
             ->with($smtp, "FOO\r\n", array(250, 251), \Mockery::any(), \Mockery::any());
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('onCommand')
             ->once()
             ->with($smtp, "FOO\r\n", array(250, 251), \Mockery::any(), \Mockery::any());
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('onCommand')
             ->never()
             ->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
        $smtp->executeCommand("FOO\r\n", array(250, 251));
    }

    public function testChainOfCommandAlgorithmWhenNotifyingExtensions()
    {
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .+?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->never()
            ->with("FOO\r\n");
        $this->_finishBuffer($buf);

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('onCommand')
             ->once()
             ->with($smtp, "FOO\r\n", array(250, 251), \Mockery::any(), \Mockery::any())
             ->andReturnUsing(function ($a, $b, $c, $d, &$e) {
                 $e = true;

                 return "250 ok";
             });
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('onCommand')
             ->never()
             ->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('onCommand')
             ->never()
             ->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
        $smtp->executeCommand("FOO\r\n", array(250, 251));
    }

    public function testExtensionsCanExposeMixinMethods()
    {
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandlerMixin')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('exposeMixinMethods')
             ->zeroOrMoreTimes()
             ->andReturn(array('setUsername', 'setPassword'));
        $ext1->shouldReceive('setUsername')
             ->once()
             ->with('mick');
        $ext1->shouldReceive('setPassword')
             ->once()
             ->with('pass');
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
        $smtp->setUsername('mick');
        $smtp->setPassword('pass');
    }

    public function testMixinMethodsBeginningWithSetAndNullReturnAreFluid()
    {
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandlerMixin')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('exposeMixinMethods')
             ->zeroOrMoreTimes()
             ->andReturn(array('setUsername', 'setPassword'));
        $ext1->shouldReceive('setUsername')
             ->once()
             ->with('mick')
             ->andReturn(null);
        $ext1->shouldReceive('setPassword')
             ->once()
             ->with('pass')
             ->andReturn(null);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
        $ret = $smtp->setUsername('mick');
        $this->assertEquals($smtp, $ret);
        $ret = $smtp->setPassword('pass');
        $this->assertEquals($smtp, $ret);
    }

    public function testMixinSetterWhichReturnValuesAreNotFluid()
    {
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandlerMixin')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('exposeMixinMethods')
             ->zeroOrMoreTimes()
             ->andReturn(array('setUsername', 'setPassword'));
        $ext1->shouldReceive('setUsername')
             ->once()
             ->with('mick')
             ->andReturn('x');
        $ext1->shouldReceive('setPassword')
             ->once()
             ->with('pass')
             ->andReturn('x');
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
        $this->assertEquals('x', $smtp->setUsername('mick'));
        $this->assertEquals('x', $smtp->setPassword('pass'));
    }
}
