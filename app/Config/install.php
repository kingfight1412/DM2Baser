<?php
Configure::write('Security.salt', '5J6C0DTYQEICDHSR08MJWAOC0W4DhmcbG7FiCIPa');
Configure::write('Security.cipherSeed', '19716253601623647788808711133');
Configure::write('Cache.disable', false);
Configure::write('Cache.check', true);
Configure::write('Session.save', 'session');
Configure::write('BcEnv.siteUrl', 'http://localhost:8080/hoangnm/basercms-4.2.1/basercms/');
Configure::write('BcEnv.sslUrl', '');
Configure::write('BcEnv.mainDomain', '');
Configure::write('BcApp.adminSsl', false);
Configure::write('BcApp.allowedPhpOtherThanAdmins', false);
Cache::config('default', array('engine' => 'File'));
Configure::write('debug', 0);