import axios from './axios';

class Config
{

    //botões de ação
    actions()
    {

        //botão de voltar
        $('.go-back').attr('title', 'Back to previous page').click(() =>  {
            history.back();
        });


        //delete action
        $('body').on('click', '.action-delete', function(e) {

            let field     = $(this);
            let row       = field.attr('data-row');
            let route     = field.attr('data-route');
            let message   = field.attr('data-message') || 'Tem certeza que deseja remover este item?';
            let reload    = field.attr('data-reload');

            swal({
                title: 'Remover',
                text: message,
                dangerMode: !0,
                allowOutsideClick : !1,
                content: {
                    element: "input",
                    attributes: {
                        placeholder: 'Senha:',
                        type: "password",
                    },
                },
                buttons : {
                    cancel: {
                        text: 'Cancelar',
                        value: null,
                        visible: !0,
                        closeModal: !0,
                    },
                    confirm: {
                        text: 'Remover',
                        value: !0,
                        visible: !0,
                        closeModal: !1
                    }
                },
            }).then(function (password) {

                if (password === !1 || password === "" || password === null) {
                    swal.close();
                }else{

                    //chama a rota de exclusão
                    axios.post(route, {
                        password
                    }).then(res => {

                        //remove a linha da tabela
                        field.closest('table.datatable').DataTable().api().row(
                            $(document).find('a[data-row="' + row + '"]').closest('tr,tr[role="row"],tr[class="child"]')
                        ).remove().draw(!1);

                        //exibe a mensagem de confirmação
                        $.notify({ message : res.data.message }, {
                            type : 'success'
                        });

                    }).finally(() => {
                        swal.close(); if(reload) window.location.reload();
                    });

                }

            });

        })
            .on('click', '.action-confirm', function() {

            let field     = $(this);
            let title     = field.data('title');
            let message   = field.data('message');
            let password  = field.data('password');
            let reload    = field.data('reload');
            let cancelBtn = field.data('cancel-button');
            let okBtn     = field.data('ok-button');
            let route     = field.data('route');

            //adiciona o input caso a ação nescessite de confirmação de senha
            let content = (password != null) ? {
                element: "input",
                attributes: {
                    placeholder: 'Senha:',
                    type: "password",
                }
            } : null;

            swal({
                title: title,
                text: message,
                content: content,
                allowOutsideClick : !1,
                buttons : {
                    cancel: {
                        text: (cancelBtn != null) ? cancelBtn : 'Cancelar',
                        value: null,
                        visible: !0,
                        closeModal: !0,
                    },
                    confirm: {
                        text: (okBtn != null) ? okBtn : 'Confirmar',
                        value: !0,
                        visible: !0,
                        closeModal: !1
                    }
                },
            }).then(function (password) {
                if (password != null && password === !1 || password === "" || password === null){
                    swal.close();
                }else{

                    //chama a rota de exclusão
                    axios.post(route, {
                        password
                    }).then(res => {

                        //exibe a mensagem de confirmação
                        $.notify({ message : res.data.message }, {
                            type : 'success'
                        });

                    }).finally(() => {
                        swal.close(); if(reload) window.location.reload();
                    });

                }

            });

        });

    }

    //bootstrap filestyle
    boostrapFilestyle(el)
    {

        el = el || $('.file-style');

        let label = el.attr('data-text') || 'Open';
        let input = el.data('data-input') || 'fa fa-folder';
        let icon  = el.data('data-icon') || 'btn-primary';

        el.filestyle({
            input: input,
            buttonText : label,
            iconName   : icon,
            buttonName : 'btn-primary',
        });

    }

    //bootstrap date pickers
    bootstrapDateTimePicker()
    {

        $.fn.datepicker.defaults.zIndexOffset = 10;

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });

        //configura os icones
        $.fn.timepicker.defaults = $.extend(true, {}, $.fn.timepicker.defaults, {
            icons: {
                up: 'icon-line-awesome-angle-up',
                down: 'icon-line-awesome-angle-down'
            }
        });

        //seletor de data
        $(".mask-date").datetimepicker({
            format: "DD/MM/YYYY"
        });

        //seletor de hora
        $(".mask-hour").datetimepicker({
            format: "LT",
        });

        //seletor de data e hora
        $(".mask-date-time").datetimepicker({
            format: "DD/MM/YYYY HH:II"
        });

    }

    //bootstrap dual listbox
    bootstrapDualListBox(el, options = [])
    {

        return;

        el = el || $('.dual-list');

        let available = el.attr('data-available-title') || 'Available';
        let selected = el.attr('data-selected-title') || 'Selected';

        // get options
        el.children('option').each(function () {
            options.push({text: $(this).text(), value: $(this).val(), selected: $(this).is(':selected')});
        });

        new DualListbox(el, {
            availableTitle: available,
            selectedTitle: selected,
            addButtonText: '>',
            removeButtonText: '<',
            addAllButtonText: '>>',
            removeAllButtonText: '<<',
            options: options
        });

    }

    //bootstrap notify
    bootstrapNotify()
    {

        $.notifyDefaults({
            type : 'info',
            allow_dismiss: true,
            newest_on_top: true,
            spacing: 10,
            timer: 3000,
            placement: {
                from: 'bottom',
                align: 'right'
            },
            offset: {
                x: 30,
                y: 30
            },
            delay: 1000,
            z_index: 10000,
            animate: {
                enter: 'animated bounce',
                exit: 'animated bounce'
            },
            template: '<div data-notify="container" class="alert alert-{0} m-alert" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span>' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-animated bg-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });

    }

    //bootstrap-switch
    bootstrapSwitch()
    {
        $.fn.bootstrapSwitch.defaults.size = 'medium';
        $.fn.bootstrapSwitch.defaults.onColor = 'info';
    }

    //checkbox selection
    checkboxes(el){

        el = el || $('.checkbox-main');

        el.change(function(){

            let checked = $(this).is(":checked");

            $(this).closest('.checkbox-container').find('input.checkbox-chield').each(function(){
                $(this).prop('checked', checked);
            });

        });

    }

    //clipboardjs
    clipboardJS()
    {

        new ClipboardJS('.copy').on('success', function(e){

            swal(
                el.attr('data-confirmation') || "Text successfully copied."
            ).finally(function(){
                e.clearSelection()
            });

        }).on('error', function(e){
            swal('Error copying text to clipboard.');
        });

    }

    //datatables
    datatables(el)
    {

        el = el || $('table.datatable');



        let search = el.data('search') || !0;
        let length = el.data('length') || !0;
        let steps  = el.data('steps')  || 100;
        let paging = el.data('paging') || !0;
        let info   = el.data('info') || !0;

        let column = el.data('column') || 0;
        let direction = el.data('direction') || "asc";

        el.DataTable({
            responsive: true,
            dom: '<"toolbar">frtip',
            searching: search,
            lengthChange: length,
            pageLength: steps,
            paging: paging,
            info: info,
            colReorder: !0,
            ordering : !0,
            order: [[column, direction]],
            language: {
                "paginate": {
                    "first": '<i class="la la-angle-double-left"></i>',
                    "last": '<i class="la la-angle-double-right"></i>',
                    "next": '<i class="la la-angle-right"></i>',
                    "previous": '<i class="la la-angle-left"></i>',
                    "lengthMenu": "Mostrando _MENU_ itens page",
                    "zeroRecords": "Não possui registros",
                    "info": "Mostrando page _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            },
            initComplete: function() {
                $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off')
            }
        });

        //correção para funcionamento dos dropdowns
        $('body').on('show.bs.dropdown', function(e) {

            // e.target is always parent (contains toggler and menu)
            var $toggler = $(e.target).find("[data-attach='body']");
            if ($toggler.length === 0) {
                return;
            }
            var $dropdownMenu = $(e.target).find('.dropdown-menu');
            // save detached menu
            var $detachedDropdownMenu = $dropdownMenu.detach();
            // save reference to detached menu inside data of toggler
            $toggler.data('dropdown-menu', $detachedDropdownMenu);

            $('body').append($detachedDropdownMenu);
            $detachedDropdownMenu.css('display', 'block');
            $detachedDropdownMenu.position({
                my: 'right top',
                at: 'right bottom',
                of: $(e.relatedTarget),
            });

        }).on('hide.bs.dropdown', function(e) {

            var $toggler = $(e.target).find("[data-attach='body']");
            if ($toggler.length === 0) {
                return;
            }
            // access to reference of detached menu from data of toggler
            var $detachedDropdownMenu = $toggler.data('dropdown-menu');
            // re-append detached menu inside parent
            $(e.target).append($detachedDropdownMenu.detach());
            // hide dropdown
            $detachedDropdownMenu.hide();

        });

    }


    //ajax form submission
    forms(el)
    {

        let element = el || $('form.form');

        element.each((i, el) => {
            el = $(el);
            //sinalização de campo obrigatório automático
            el.find('*[required]').siblings('label:not(:has(>em))').append('<em class="text-danger">*</em>');

            el.attr('novalidate', 'novalidate').submit(function (e)
            {

                //recupera o botão de submissão
                const submit = $(this).find('button[type="submit"]');

                //desabilita o post do browser
                e.preventDefault();

                //valida o formulário
                if ($(this).valid())
                {

                    //desabilita o botão de salvar
                    submit.attr('disabled', 'disabled');

                    //envia o formulário
                    axios.post(el.attr('action'), new FormData(this)).finally(() => {
                        submit.removeAttr('disabled');
                    });

                }else{

                    //notifica o erro de validação
                    $.notify({ message : 'Verifique as informações. ' }, {
                        type : 'warning'
                    });

                }

            });
        });

    }

    //navegação em formulário via teclado
    keyboardNaviation()
    {

        $('body').children('input,select,textarea').keypress(function (e)
        {
            if (e.keyCode === 13) {
                e.preventDefault();
                let inputs = $(this).parents("form").eq(0).find(":input");
                let idx = inputs.index(this);

                if (idx === inputs.length - 1) {
                    inputs[0].select()
                } else {
                    inputs[idx + 1].focus();
                    inputs[idx + 1].select();
                }
                return !1;
            }
        });

    }

    //select2js
    select2(e, options = [], first = 'Select an item...')
    {

        let element = e || $('select.selectpicker');

        element.each((i, el) => {
            if(options.length > 0){

                $(el).empty().append(`<option value="">${first}</option>`);

                for(let i = 0; i < options.length; i++){
                    $(el).append(`<option value="${options[i].value}" ${options[i].selected ? 'selected' : ''}>${options[i].name}</option>`);
                }

            }

            $(el).css({width: '100%'}).selectpicker({
                style: 'btn-info',
                size: 4
            });
        });

    }

    //masks configuration
    masks(el) {

        el = el || $('body');
        el.find('.mask-date').mask('00/00/0000');
        el.find('.mask-hour').mask('00:00');
        el.find('.mask-phone').mask('(00)00000-0000');
        el.find('.mask-money').mask('000.000.000.000.000,00', { reverse: !0 });
        el.find('.mask-number').mask('0#');

    }

    //jquery validator
    validator()
    {

        const valGetParentContainer = function(el) {

            el = $(el);

            if ($(el).closest('.form-group-sub').length > 0) {
                return $(el).closest('.form-group-sub')
            } else if ($(el).closest('.bootstrap-select').length > 0) {
                return $(el).closest('.bootstrap-select')
            } else {
                return $(el).closest('.form-group');
            }
        };

        $.validator.setDefaults({
            errorElement: 'div', //default input error message container
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input

            errorPlacement: function(error, element) { // render error placement for each input type
                var element = $(element);

                var group = valGetParentContainer(element);
                var help = group.find('.form-text');

                if (group.find('.valid-feedback, .invalid-feedback').length !== 0) {
                    return;
                }

                element.addClass('is-invalid');
                error.addClass('invalid-feedback');

                if (help.length > 0) {
                    help.before(error);
                } else {
                    if (element.closest('.bootstrap-select').length > 0) {     //Bootstrap select
                        element.closest('.bootstrap-select').wrap('<div class="bootstrap-select-wrapper" />').after(error);
                    } else if (element.closest('.input-group').length > 0) {   //Bootstrap group
                        element.after(error);
                    } else {                                                   //Checkbox & radios
                        if (element.is(':checkbox')) {
                            element.closest('.kt-checkbox').find('> span').after(error);
                        } else {
                            element.after(error);
                        }
                    }
                }
            },

            highlight: function(element) { // hightlight error inputs
                var group = valGetParentContainer(element);
                group.addClass('validate');
                group.addClass('is-invalid');
                $(element).removeClass('is-valid');
            },

            unhighlight: function(element) { // revert the change done by hightlight
                var group = valGetParentContainer(element);
                group.removeClass('validate');
                group.removeClass('is-invalid');
                $(element).removeClass('is-invalid');
            },

            success: function(label, element) {
                var group = valGetParentContainer(element);
                group.removeClass('validate');
                group.find('.invalid-feedback').remove();
            }
        });

        $.validator.addMethod("email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a valid Email.");

    }

    //inicialização
    init()
    {
        this.actions();
        this.boostrapFilestyle();
        this.bootstrapDateTimePicker();
        this.bootstrapDualListBox();
        this.bootstrapNotify();
        this.bootstrapSwitch();
        this.bootstrapNotify();
        this.checkboxes();
        this.clipboardJS();
        this.datatables();
        this.forms();
        this.keyboardNaviation();
        this.select2();
        this.masks();
        this.validator();
    }

}

export default new Config();
