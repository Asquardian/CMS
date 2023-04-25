
jQuery(document).ready(function ($) {
    var engine = new Bloodhound({
        datumTokenizer: function (engine) {
            return Bloodhound.tokenizers.whitespace(engine.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/site/cms/public/autocomplete?term=%QUERY%',
            wildcard: '%QUERY%',
            filter: function (response) {
                console.log(response);
                return response;
            }
        }
    });
    engine.initialize();
    $('#term').typeahead(
        {
            classNames: {
                dataset: 'w-100',
                menu: 'w-100'
              },
            hint: false,
            highlight: false,
            minLength: 1
        },
        {
            name: "suggestions",
            displayKey: "name",
            limit: 4,
            templates: {
                empty: [
                    '<div class="list-group-item drop"><a>Nothing found.</a></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function(data) {
                     var details = "<div class='list-group-item drop'> <a href='/site/cms/public/anime/" + data.url + "'>" 
                                   + data.name 
                                   + "</a></div>" 
                     return details
                }
            },
            source: engine.ttAdapter(),
            // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.

            // the key from the array we want to display (name,id,email,etc...)

        });
});