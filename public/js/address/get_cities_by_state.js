$(function() {
    var get_cities_by_state = $('#get_cities_by_state');
    
    if (get_cities_by_state.length > 0) {
        var state_id = $('#state_id');
        var city_id = $('#city_id');
        var _token = get_cities_by_state.find("input[name='_token']").val()
        var job_city_id = $('#job_city_id');

        if (state_id.val() != null) {
            ajaxGetCitiesByState();
        }
        
        state_id.on('change', function(){
            ajaxGetCitiesByState()
        });

        function ajaxGetCitiesByState()
        {
            $.post(get_cities_by_state.attr('action'), {
                _token: _token,
                state_id: state_id.val()
            }, function(data){
                // console.log(data);
            }).done(function(data) {
                city_id.find('option').remove();
   
                if (job_city_id.val() != null) {
                    $.each(data, function (key, city) {
                        if (job_city_id.val() == city.id) {
                            city_id.append(
                                "<option selected value="+city.id+">"+city.name+"</option>"
                            );
                        } else {
                            city_id.append(
                                "<option value="+city.id+">"+city.name+"</option>"
                            );
                        }
                    });
                } else {
                    $.each(data, function (key, city) {
                        city_id.append(
                            "<option value="+city.id+">"+city.name+"</option>"
                        );
                    });
                }
            });
        }
    }
});