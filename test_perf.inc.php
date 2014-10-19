<?php
function test_perf( $num_calls, $callback )
{
  $start = microtime(true);
  for( $i=0; $i<$num_calls; ++$i ) {
    $callback();
  }
  return microtime(true) - $start;
}
?>
