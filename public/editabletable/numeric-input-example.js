/* global $ */
/* this is an example for validation and change events */
$.fn.numericInputExample = function () {
    'use strict';
    var element = $(this),
            footer = element.find('tfoot tr'),
            dataRows = element.find('tbody tr'),
            dataTotalRows = element.find('tbody tr'),
            columnselected = 1,
            initialTotal = function () {
                var column, totalColumn;
                for (column = 1; column < footer.children().size(); column++) {
                    totalColumn = 0;
                    dataRows.each(function () {
                        var row = $(this);
                        totalColumn += parseFloat(row.children().eq(column).text());
                    });
                    footer.children().eq(column).text(totalColumn.toFixed(2));
                }
                ;
            };


    element.find('td').on('change', function (evt) {
        var cell = $(this),
                column = cell.index(),
                totalColumn = 0;
        columnselected = column;
        if (column === 0 || column === 14) {
            return;
        }
        element.find('tbody tr').each(function () {
            var row = $(this);
            totalColumn += parseFloat(row.children().eq(column).text());
        });
        if(column === 1)
        {
            
        }
        else
        {
            $('.alert').hide();
            footer.children().eq(column).text(totalColumn.toFixed(2));
        }
        
    }).on('validate', function (evt, value) {
        var cell = $(this),
                column = cell.index();
        if (column === 0 || column === 14) {
            return !!value && value.trim().length > 0;
        } else {
            return !isNaN(parseFloat(value)) && isFinite(value);
        }
    });
    
    element.find('tr').on('change', function (evt) {
        var cell = $(this),
                row = cell.index(),
                totalRow = 0;
//        console.log(columnselected);
        if(columnselected === 1)
        {
//            console.log(row.children().eq(columnselected).text());
            element.find('tbody tr').each(function () {
                var rows = $(this);
                if (rows.index() === row) {
                    totalRow = parseFloat(rows.children().eq(columnselected).text() / 12);
//                    console.log(totalRow);
//                    for (var i = 2; i < rows.children().size() - 1; i++) {
//                        totalRow += parseFloat(rows.children().eq(i).text());
//
//                    }
                }
            });
            $('.alert').hide();
            for (var i = 2; i < 14; i++) {
                dataTotalRows.eq(row).find('td').eq(i).text(totalRow.toFixed(2));
            }
        }
        else
        {
            element.find('tbody tr').each(function () {
                var rows = $(this);
                if (rows.index() === row) {
                    for (var i = 2; i < rows.children().size() - 1; i++) {
                        totalRow += parseFloat(rows.children().eq(i).text());

                    }
                }
            });

            $('.alert').hide();
            dataTotalRows.eq(row).find('td').eq(1).text(totalRow.toFixed(2));
        }


    }).on('validate', function (evt, value) {
        var cell = $(this),
                column = cell.index();
        if (column === 0 || column === 14) {
            return !!value && value.trim().length > 0;
        } else {
            return !isNaN(parseFloat(value)) && isFinite(value);
        }
    });
    
    initialTotal();
    return this;
};
