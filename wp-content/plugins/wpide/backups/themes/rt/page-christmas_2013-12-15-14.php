<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097f052a5b2862"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/page-christmas.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/page-christmas_2013-12-15-14.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?>