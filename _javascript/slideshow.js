 $(document).ready(function(){
    $('.thumbnail').click(function(){
        target = $(this).parent().parent().children('img')
        $(target).attr('src', extract_url($(this).css('background-image')));
    })
});
            
function extract_url(input) {
    return input.replace(/"/g,"").replace(/url\(|\)$/ig, "");
}