var $grid = $('.isotope-grid').isotope({
    // options
    itemSelector: '.isotope-item',
    layoutMode: 'fitRows'
});

// filter items on button click
$('.filter-button-group').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
});