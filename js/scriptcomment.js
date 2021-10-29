$("#commentButton").click(function (){
    comment = $('#commentText').val();
    uid = $("#uid").val();
    gid = $("#gid").val();

    $.post("savecomment.php", {
        "uid": uid,
        "gid": gid,
        "comment": comment
    }, function (data){
        $('#comments2').append('<p class="comment-text">comment</p>')
    });

    // $.post("cartupdate.php", {"goodId":gid, "goodNum": gnum},
    //     function(data){
    //         $(this).parent().children("input[type=number]").val(gnum);
    //     })

});