(function ($) {
    $.fn.ajaxDropDown = function (options) {
        var settings = $.extend(true, {
            activeClass: 'active',
            disabledClass: 'disabled',
            errorClass: '',
            errorStyle: '',
            headerClass: '',
            headerStyle: '',
            hiddenClass: 'hidden',
            loadingClass: '',
            loadingStyle: '',
            markBegin: '',
            markEnd: '',
            minQuery: 0,
            name: 'ajaxDropDown',
            nextBegin: '',
            nextClass: '',
            nextEnd: '',
            nextStyle: '',
            noRecordsClass: '',
            noRecordsStyle: '',
            pagerBegin: '',
            pagerEnd: '',
            previousBegin: '',
            previousClass: '',
            previousEnd: '',
            previousStyle: '',
            progressBar: '',
            recordClass: '',
            recordStyle: '',
            removeClass: '',
            removeLabel: '',
            removeStyle: '',
            resultClass: '',
            resultStyle: '',
            singleMode: false,
            switchClass: '',
            switchStyle: '',
            triggerEvent: '',
            url: '',
            local: {
                allRecords: 'All records',
                recordsContaining: 'Records containing',
                minimumCharacters: 'Type at least {NUM} character(s) to filter the results...',
                error: 'Error',
                previous: 'previous',
                next: 'next',
                noRecords: 'No matching records found'
            }
        }, options);
        var ul = this.find('.ajaxDropDownMenu');
        var progressBar = '<li class="ajaxDropDownLoading';
        if (settings.loadingClass !== '') progressBar += ' ' + settings.loadingClass;
        progressBar += '"';
        if (settings.loadingStyle !== '') progressBar += ' style="' + settings.loadingStyle + '"';
        progressBar += '>' + settings.progressBar + '</li>';
        var headerStart = '<li class="dropdown-header';
        if (settings.headerClass !== '') headerStart += ' ' + settings.headerClass;
        headerStart += '"';
        if (settings.headerStyle !== '') headerStart += ' style="' + settings.headerStyle + '"';
        headerStart += '>';
        var headerMinimumCharacters = settings.local.minimumCharacters.replace(/{NUM}/g, settings.minQuery);
        var error = '<li class="dropdown-header';
        if (settings.errorClass !== '') error += ' ' + settings.errorClass;
        error += '"';
        if (settings.errorStyle !== '') error += ' style="' + settings.errorStyle + '"';
        error += '>' + settings.local.error + '</li>';
        var noRecords = '<li class="dropdown-header';
        if (settings.noRecordsClass !== '') noRecords += ' ' + settings.noRecordsClass;
        noRecords += '"';
        if (settings.noRecordsStyle !== '') noRecords += ' style="' + settings.noRecordsStyle + '"';
        noRecords += '>' + settings.local.noRecords + '</li>';
        this.on(settings.triggerEvent, function(){
            if (ul.find('.ajaxDropDownPages').length === 0) {
                var page = $(this).find('.ajaxDropDownToggle').data('page');
                page = page * 1;
                var search = false;
                var header = headerStart + settings.pagerBegin + '<span class="ajaxDropDownPageNumber">' + page + '</span>/<span class="ajaxDropDownTotalPages">1</span>';
                header += settings.pagerEnd + settings.local.allRecords + '</li><li class="divider"></li>' + progressBar;
                var query = $(this).find('input[type=text]').val();
                if (settings.minQuery > 0) {
                    if (query.length >= settings.minQuery) {
                        header = headerStart + settings.pagerBegin + '<span class="ajaxDropDownPageNumber">' + page + '</span>/<span class="ajaxDropDownTotalPages">1</span>';
                        header += settings.pagerEnd + settings.local.recordsContaining + ' <strong>' + query;
                        header += '</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li class="divider"></li>' + progressBar;
                        search = true;
                    }
                    else header = headerStart + headerMinimumCharacters + '</li>';
                }
                else search = true;
                ul.html(header);
                if (search) {
                    $.post(settings.url, {query:query, page:page}).
                        fail(function(){ul.append(error);}).
                        done(function(data){
                            var results = $.parseJSON(data);
                            if (results.total === undefined) results.total = 1;
                            if (results.page === undefined) results.page = 1;
                            if (results.data.length) {
                                ul.find('.ajaxDropDownTotalPages').text(results.total);
                                for (i in results.data) {
                                    var result = '<li class="ajaxDropDownPages ajaxDropDownPage' + results.page + ' ajaxDropDownRecord'+ results.data[i].id;
                                    if (settings.recordClass !== '') result += ' ' + settings.recordClass;
                                    if (ul.parent().parent().parent().find('.ajaxDropDownSelected' + results.data[i].id).length) result += ' ' + settings.activeClass;
                                    result += '"';
                                    if (settings.recordStyle !== '') result += ' style="' + settings.recordStyle + '"';
                                    result += '><a href="#" class="ajaxDropDownResult" data-id="'+ results.data[i].id +'">';
                                    if (results.data[i].mark) result += settings.markBegin;
                                    result += results.data[i].value;
                                    if (results.data[i].mark) result += settings.markEnd;
                                    result += '</a></li>';
                                    ul.append(result);
                                }
                                if (results.total > 1) {
                                    var pages = '<li class="divider ajaxDropDownInfo"></li><li class="ajaxDropDownInfo';
                                    if (settings.switchClass !== '') pages += ' ' + settings.switchClass;
                                    pages += '"';
                                    if (settings.switchStyle !== '') pages += ' style="' + settings.switchStyle + '"';
                                    pages += '><a href="#" class="ajaxDropDownPrev';
                                    if (settings.previousClass !== '') pages += ' ' + settings.previousClass;
                                    if (results.page === 1) {
                                        pages += ' ' + settings.disabledClass;
                                    }
                                    pages += '"';
                                    if (settings.previousStyle !== '') pages += ' style="' + settings.previousStyle + '"';
                                    pages += '>' + settings.previousBegin + settings.local.previous + settings.previousEnd + '</a><a href="#" class="ajaxDropDownNext';
                                    if (settings.nextClass !== '') pages += ' ' + settings.nextClass;
                                    if (results.page === results.total) {
                                       pages += ' ' + settings.disabledClass;
                                    }
                                    pages += '"';
                                    if (settings.nextStyle !== '') pages += ' style="' + settings.nextStyle + '"';
                                    pages += '>' + settings.nextBegin + settings.local.next + settings.nextEnd + '</a></li>';
                                    ul.append(pages);
                                }
                            }
                            else ul.append(noRecords);
                        }).
                        always(function(){$('.ajaxDropDownLoading').remove();});
                }
            }
        });
        this.on('click', '.ajaxDropDownNext', function(e){
            e.preventDefault();
            e.stopPropagation();
            ul.find('.ajaxDropDownPrev').removeClass(settings.disabledClass);
            ul.find('.ajaxDropDownNext').addClass(settings.disabledClass);
            var page = ul.parent().find('.ajaxDropDownToggle').data('page');
            page = page * 1 + 1;
            if (ul.find('.ajaxDropDownPage' + page).length) {
                ul.find('.ajaxDropDownPages').addClass(settings.hiddenClass);
                ul.find('.ajaxDropDownPage' + page).removeClass(settings.hiddenClass);
                ul.find('.ajaxDropDownNext').removeClass(settings.disabledClass);
            }
            else {
                var query = ul.parent().parent().find('input[type=text]').val();
                $.post(settings.url, {query:query, page:page}).
                    fail(function(){ul.append(error);}).
                    done(function(data){
                        var results = $.parseJSON(data);
                        if (results.data.length) {
                            ul.find('.ajaxDropDownPages').addClass(settings.hiddenClass);
                            if (results.total === undefined) results.total = 1;
                            if (results.page === undefined) results.page = 1;
                            for (i in results.data) {
                                var result = '<li class="ajaxDropDownPages ajaxDropDownPage' + results.page + ' ajaxDropDownRecord'+ results.data[i].id;
                                if (settings.recordClass !== '') result += ' ' + settings.recordClass;
                                if (ul.parent().parent().parent().find('.ajaxDropDownSelected' + results.data[i].id).length) result += ' ' + settings.activeClass;
                                result += '"';
                                if (settings.recordStyle !== '') result += ' style="' + settings.recordStyle + '"';
                                result += '><a href="#" class="ajaxDropDownResult" data-id="'+ results.data[i].id +'">';
                                if (results.data[i].mark) result += settings.markBegin;
                                result += results.data[i].value;
                                if (results.data[i].mark) result += settings.markEnd;
                                result += '</a></li>';
                                ul.find('.divider.ajaxDropDownInfo').before(result);
                            }
                            if (results.page < results.total) ul.find('.ajaxDropDownNext').removeClass(settings.disabledClass);
                            else page = results.total;
                        }
                        else ul.append(noRecords);
                    });
            }
            ul.parent().find('.ajaxDropDownToggle').data('page', page);
            ul.find('.ajaxDropDownPageNumber').text(page);
        });
        this.on('click', '.ajaxDropDownPrev', function(e){
            e.preventDefault();
            e.stopPropagation();
            ul.find('.ajaxDropDownNext').removeClass(settings.disabledClass);
            ul.find('.ajaxDropDownPrev').addClass(settings.disabledClass);
            var page = ul.parent().find('.ajaxDropDownToggle').data('page');
            page = page * 1 - 1;
            if (page < 1) page = 1;
            ul.find('.ajaxDropDownPages').addClass(settings.hiddenClass);
            ul.find('.ajaxDropDownPage' + page).removeClass(settings.hiddenClass);
            if (page > 1) ul.find('.ajaxDropDownPrev').removeClass(settings.disabledClass);
            ul.parent().find('.ajaxDropDownToggle').data('page', page);
            ul.find('.ajaxDropDownPageNumber').text(page);
        });
        this.on('keyup', 'input[type=text]', function(){
            $(this).parent().find('.ajaxDropDownToggle').data('page', 1);
            $(this).parent().find('.ajaxDropDownMenu').find('.ajaxDropDownPages').remove();
        });
        this.on('click', '.ajaxDropDownResult', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var label = $(this).html();
            var results = $(this).parent().parent().parent().parent().parent().find('.ajaxDropDownResults');
            var arrayMode = '[]';
            if (settings.singleMode) {
                results.html('');
                $(this).parent().parent().find('.ajaxDropDownPages').removeClass(settings.activeClass);
                arrayMode = '';
            }
            if ($(this).parent().hasClass(settings.activeClass)) {
                $(this).parent().removeClass(settings.activeClass);
                results.find('.ajaxDropDownSelected' + id).remove();
            }
            else {
                $(this).parent().addClass(settings.activeClass);
                if (settings.singleMode) arrayMode = '';
                var selected = '<li class="ajaxDropDownSelected' + id;
                if (settings.resultClass !== '') selected += ' ' + settings.resultClass;
                selected += '"';
                if (settings.resultStyle !== '') selected += ' style="' + settings.resultStyle + '"';
                selected += '><a href="#" class="ajaxDropDownRemove';
                if (settings.removeClass !== '') selected += ' ' + settings.removeClass;
                selected += '"';
                if (settings.removeStyle !== '') selected += ' style="' + settings.removeStyle + '"';
                selected += ' data-id="' + id + '">' + settings.removeLabel + '</a>' + label + '<input type="hidden" name="' + settings.name + arrayMode + '" value="' + id + '" /></li>';

                results.append(selected);
            }
        });
        this.on('click', '.ajaxDropDownRemove', function(e){
            e.preventDefault();
            $(this).parent().parent().parent().find('.ajaxDropDownRecord' + $(this).data('id')).removeClass(settings.activeClass);
            $(this).parent().remove();
        });
        return this;
    };
}(jQuery));
