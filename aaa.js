$(document).ready(function() {
           $("#keyword").keyup(function() {
               var k = $(this).val();
               $("#user-table > tbody > tr").hide();
               var temp = $("#user-table > tbody > tr > td:nth-child(1n+1):contains('" + k + "')");

               $(temp).parent().show();
           })
       })
