io	 zonealarm�","@@||google.pn/afs/$script,subdocument,	(main=~abc.gSalheaO|~allone.� alpha�er!(|~appliance! %]avas�avirQ8b1.org|~bizwiki	+ bluelighti%�4calibex.co.uk| m2 .au jp|~check%�N� chilimovi-�clIi�cmbf�	 ombinepdf2@ ,omparison411SompressB* olI�2@ rawleM�cent ehealthiq	\<emailaccountlogiA�|~excit�%de$fr|~fansho% m stbrowser.� filezip6  n!�web) findprice!�Julltab.3 graziaE�$guenstiger�	�yX,homegardenprMdnewtam!huuto)� i!�.i iineda!m|~inboAtoolba-Y� incognito2lins2�  i	pnow)�Tistream.link|~itsindev	jun�
	9	�Lkieskeurig.be|~knowz+koopje24%/lifei�	RlocalmoxQ�lookanyoksmar,(uckypetstor-�mapsnmode9ymonsterMp	Pmyuo	�result-7mysIkm| t�space��5�netze1�e�	a xtag.ca|~�D oe�a� m(i�A�es%ait�PHnip.io|~nortonsafe.���,offeroftheda!�omnipriMuonm� y%�tyl-�pch)P pdfconver2�playbuzz$0reissuchmasch���eqma	��: m|6 �#ndMj$privatizem�rotecte�3relol��)-poiQB	����������� s������������������������������������������������������������ t������������������������������������������������������������ro������������������������������������������������������������������������������������������������������������������������ru������������������������������ w������������������������������������������������������������sc������������������������������������������������������������ e������������������������������������������������������������ h������������������������������������������������������������ i������������������������������������������������������������ k������������������������������������������������������������ m��������������������������������������������������������������a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a��a�a�a s��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R��R�R�Rsr�������������������������������������������������������������i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�i�iitd������������������������������tg������������������������������������������������������������ l�������������������������������������������������������������<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<< t�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<< t�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<�<< t��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4�4�4 u�(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(��(�(� v��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4��4�4�4 v����������������������������������������������������������������������������������������� w����������������������������������������������������������ֆ!A101@�targe�$^$elemhide[�com/ud�\�NFD ads$d��2' � 2/olx.plB� bgR roR uz2 d 3da��2! *KӮ� L[=2�%� 4-bestbu{��� �OaV� 6( � 50��att���!2Q eV� >* ! Yahoo �΀/in-feed ads (https://adblockplus�҈/forum/viewtopic.php?f=12&t=18121)"2� b��P/th?*^pid=Ads^$image,M�	x.y�A�(doubleclick!$(/clk^$popup�9  ;69 >k ,track.adforml:h >/ mediaplD�m/ad/ck/va 0bs.serving-sy
� /0/adServer.bs?vE a.twiag%$/ad)phpz6 ds.per�atv� /;zr partnerCysm9�/ypa/$"��su.���everyaHP 5.4 only.');
        }

        session_start();
        $this->proxy->setName('foo');
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testId()
    {
        $this->assertEquals(session_id(), $this->proxy->getId());
        $this->proxy->setId('foo');
        $this->assertEquals('foo', $this->proxy->getId());
        $this->assertEquals(session_id(), $this->proxy->getId());
    }

    /**
     * @expectedException \LogicException
     */
    public function testIdExceptionPhp53()
    {
        if (PHP_VERSION_ID >= 50400) {
            $this->markTestSkipped('Test skipped, for PHP 5.3 only.');
        }

        $this->proxy->setActive(true);
        $this->proxy->setId('foo');
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @expectedException \LogicException
     */
    public function testIdExceptionPhp54()
    {
        if (PHP_VERSION_ID < 50400) {
            $this->markTestSkipped('Test skipped, for PHP 5.4 only.');
        }

        session_start();
        $this->proxy->setId('foo');
    }
}
