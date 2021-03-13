<?php

/*
 * This file is part of Laravel WuBook.
 *
 * (c) Filippo Galante <filippo.galante@b-ground.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    /*
     * Account informations
     */
    'username' => 'PJ008',
    'password' => 'vahr95pu',
    'provider_key' => 'e3b3b50a3d3592773d99feea73225e1b49dda3f9ccd665cc',
    'lcode' => '1430902629',
    /*
     * If `cache_token` is set to true, all the API function will use a cached value and automatically renew it if necessary.
     * The cache key for the token is 'wubook.token'. The package will store also a 'wubook.token.ops' key, in order to trace the number of calls made with current token,
     * in order to refresh it if the maximum number of operation has been reached.
     *
     * **Attention:** If `cache_token` is set to false, the package will not check if the token has exceeded the maximum number of operations!
     *
     * Please read http://tdocs.wubook.net/wired/policies.html
     */
    'cache_token' => true
];
