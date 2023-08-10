function searchEbook() {
    var searchQuery = document.getElementById("searchQuery").value;

    // Send an AJAX request to search.php
    $.ajax({
        url: "new.php",
        type: "POST",
        data: { query: searchQuery },
        success: function(response) {
            // Display the search results
            document.getElementById("results").innerHTML = response;
        }
    });
}
