function success(response){
    $("#test").append(JSON.stringify(response));
}

$(document).ready(function(){
    var article_id = $("#article_id").text();

    $.ajax({
        type: "POST",
        url: '/src/components/client.php',
        data: {article_id},
        success:function callAjax(data){
            $.ajax({
                crossDomain: true,
                type: "POST",
                dataType: "json",
                url: 'http://topgenerator.ll:8888/index.php',
                data: data,
                processData: false,
                contentType: "application/json; charset=UTF-8",
                success: success
            });
        }
        
    });
});

