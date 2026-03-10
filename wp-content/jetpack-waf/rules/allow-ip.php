<?php
$waf_allow_list = array (
  0 => '128.233.6.122',
);
return $waf->is_ip_in_array( $waf_allow_list );
