(function($) {

    // $element.find('.wgc-phone-field__phone-code').select2({
    //     minimumInputLength: 3,
    //     dropdownParent: $element.find('.wgc-phone-field'),
    //     dropdownCssClass: 'wgc-phone-field__dropdown',
    //     data: [
    //         { id: defaultData.country_calling_code, text: defaultData.country_name, icon: defaultData.flag, selected: true }
    //     ],
    //     templateResult: function(state) {
    //         if (!state.id) {
    //             return state.text;
    //         }
    //         var $state = $(
    //             '<div class="wgc-phone-field__option"><img src="' + state.icon + '" class="wgc-phone-field__option--icon" /><span class="wgc-phone-field__option--text">' + state.text + '</span></div>'
    //         );
    //         return $state;
    //     },
    //     templateSelection: function(state) {
    //         if (!state.id) {
    //             return state.text;
    //         }
            
    //         var $state = $(
    //             '<div class="wgc-phone-field__selected"><img class="wgc-phone-field__selected--icon" /></div>'
    //         );
            
    //         $state.find(".wgc-phone-field__selected--icon").attr("src", state.icon);
            
    //         return $state;
    //     },
    //     ajax: {
    //         url: function(params) {
    //             return 'https://restcountries.com/v3.1/name/' + params.term;
    //         },
    //         processResults: function (data) {
    //             var results = [];
    //             data.forEach(item => {
    //                 var country = getFormattedCountry(item);
    //                 results.push({
    //                     id: country.country_calling_code, text: country.country_name, icon: country.flag   
    //                 })
    //             });
        
    //             return {
    //             results: results
    //             };
    //         },
    //     }
    // });

    // $(document).on('click', '.aela-phone-field__prefix-toggler', function() {
    //     $(this).parent().find('.aela-phone-field__prefix-container').css('display', 'block');
    // });

    // $(document).on('click', '.aela-phone-field__prefix-item', function() {
    //     $(this).parent().css('display', 'none');
    //     const code = $(this).attr('data-code');

    //     $(this).closest('.aela-phone-field').find('input').val(code + " ");
    // });
    $( window ).on( 'elementor/frontend/init', () => {
        const addHandler = ( $element ) => {
            
            getFormattedCountry = function(country)  {
                const result = {
                    "country": country.cca2,
                    "country_name": country.name.common,
                    "country_code": country.cca2,
                    "country_calling_code": country.idd.root + country.idd.suffixes[0],
                    "flag": country.flags.png
                }
                return result;
            }
            
            getCurrentLocationFlag= function(code) {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        type: "GET",
                        url: "https://restcountries.com/v3.1/alpha/" + code + "?fields=flags",
                        success: function (response) {
                            resolve(response.flags.png);
                        },
                        error: function(err) {
                            reject(err);
                        }
                    });
                });
            }
            
            getCurrentLocation = function() {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        type: "GET",
                        url: "https://ipapi.co/json/",
                        success: async function (response) {
                            const flag = await getCurrentLocationFlag( response.country_code );
            
                            response['flag'] = flag;
                            resolve(response);
                        },
                        error: function(err) {
                            reject(err);
                        }
                    });
                });
            }

            init = async function() {
                var defaultData = await getCurrentLocation();
                $element.find('.aela-phone-field__phone-code').select2({
                    minimumInputLength: 3,
                    dropdownParent: $element.find('.aela-phone-field'),
                    dropdownCssClass: 'aela-phone-field__dropdown',
                    data: [
                        { id: defaultData.country_calling_code, text: defaultData.country_name, icon: defaultData.flag, selected: true }
                    ],
                    templateResult: function(state) {
                        if (!state.id) {
                            return state.text;
                        }
                        var $state = $(
                            '<div class="aela-phone-field__option"><img src="' + state.icon + '" class="aela-phone-field__option--icon" /><span class="aela-phone-field__option--text">' + state.text + '</span></div>'
                        );
                        return $state;
                    },
                    templateSelection: function(state) {
                        if (!state.id) {
                            return state.text;
                        }
                        
                        var $state = $(
                            '<div class="aela-phone-field__selected"><img class="aela-phone-field__selected--icon" /></div>'
                        );
                        
                        $state.find(".aela-phone-field__selected--icon").attr("src", state.icon);
                        
                        return $state;
                    },
                    ajax: {
                        url: function(params) {
                            return 'https://restcountries.com/v3.1/name/' + params.term;
                        },
                        processResults: function (data) {
                            var results = [];
                            data.forEach(item => {
                                var country = getFormattedCountry(item);
                                results.push({
                                    id: country.country_calling_code, text: country.country_name, icon: country.flag   
                                })
                            });
                    
                            return {
                                results: results
                            };
                        },
                    }
                });
            }

            init();
        }
        elementorFrontend.hooks.addAction( 'frontend/element_ready/form.default', addHandler );
    });

} (jQuery) );