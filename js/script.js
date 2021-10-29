
$(".minus").click(function (){
   gid = $(this).parent().children("input[type=hidden]").val();
   gnum = $(this).parent().children("input[type=number]").val();
   $.post("cartupdate.php", {"goodId":gid, "goodNum": gnum},
       function(data){
           $(this).parent().children("input[type=number]").val(gnum);
       })

});
$(".plus").click(function (){
    gid = $(this).parent().children("input[type=hidden]").val();
    gnum = $(this).parent().children("input[type=number]").val();
    $.post("cartupdate.php", {"goodId":gid, "goodNum": gnum},
        function(data){
            $(this).parent().children("input[type=number]").val(gnum);
        })

});