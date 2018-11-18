
var numAuthors = 10;
var numDates = 10;
var numTopics = 10;
var numArticles = 15;

function funcSuccessAuthors(data) {
    $("#authors").append(data);
    numAuthors += 10;
}

function funcSuccessDates(data) {
    $("#dates").append(data);
    numDates += 10;
}

function funcSuccessTopics(data) {
    $("#topics").append(data);
    numTopics += 10;
}

function funcSuccessArticles(data) {
    $("#articles").append(data);
    numArticles += 15;
}

$(document).ready(function () {
    
    $("#loadNextAuthors").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationAuthors.php",
            type: "POST",
            data: {numAuthors: numAuthors},
            dataType: "html",
            success: funcSuccessAuthors
        });
    });
    
    $("#loadNextDates").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationDates.php",
            type: "POST",
            data: {numDates: numDates},
            dataType: "html",
            success: funcSuccessDates
        });
    });
    
        $("#loadNextTopics").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationTopics.php",
            type: "POST",
            data: {numTopics: numTopics},
            dataType: "html",
            success: funcSuccessTopics
        });
    });
    
        $("#loadNextArticles").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationArticles.php",
            type: "POST",
            data: {numArticles: numArticles},
            dataType: "html",
            success: funcSuccessArticles
        });
    });

});

