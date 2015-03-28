'use strict';

var $ = require('jquery');
var paginate = require('pagination-master/js/paginate');

// add the section number to the top of each section
$('#story .js-storySection').each(function(i, el) {
  $(el)
    .append('<div class="sectionNum">part ' + (i + 1) + '</div>')
    .attr('id', 'section' + (i + 1));
});