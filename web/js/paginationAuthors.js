var num = 10;

function funcSuccessAuthors(data) {
    $("#authors").append(data);
    num += 10;
}

function funcSuccessDates(data) {
    $("#dates").append(data);
    num += 10;
}

function funcSuccessTopics(data) {
    $("#topics").append(data);
    num += 10;
}

function funcSuccessArticles(data) {
    $("#articles").append(data);
    num += 10;
}

$(document).ready(function () {
    
    $("#loadNextAuthors").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationAuthors.php",
            type: "POST",
            data: {num: num},
            dataType: "html",
            success: funcSuccessAuthors
        });
    });
    
    $("#loadNextDates").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationDates.php",
            type: "POST",
            data: {num: num},
            dataType: "html",
            success: funcSuccessDates
        });
    });
    
        $("#loadNextTopics").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationTopics.php",
            type: "POST",
            data: {num: num},
            dataType: "html",
            success: funcSuccessTopics
        });
    });
    
        $("#loadNextArticles").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationArticles.php",
            type: "POST",
            data: {num: num},
            dataType: "html",
            success: funcSuccessArticles
        });
    });

});

