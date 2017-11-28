/**
 * Created by venkat on 18/11/15.
 */

jQuery(document).ready(function($) {
    function remove_sidebar_link(name, num) {
        answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any widgets you have assigned to this sidebar.");
        if (answer) {
            //alert('AJAX REMOVE');
            remove_sidebar(name, num);
        } else {
            return false;
        }
    }
    function add_sidebar_link() {
        var sidebar_name = prompt("Sidebar Name:", "");
        //alert(sidebar_name);
        add_sidebar(sidebar_name);
    }
    $('#generate_sidebar').click(function(evt){
        evt.preventDefault();
        add_sidebar_link();
    });

    $('.remove_sidebar').click(function(evt){
       evt.preventDefault();
        console.log('remove sidebar');
        var sidebar_name = $(this).attr('data-sidebar-name');
        var sidebar_count = $(this).attr('data-sidebar-count');
        remove_sidebar_link(sidebar_name, sidebar_count);
    });

});
