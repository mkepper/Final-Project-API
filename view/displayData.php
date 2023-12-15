<!--This forms function is to create a list of all inputs in the API table-->

<div id="apilist"></div>

<script>
    axios.get('model/timeZoneApi.php')
    .then(function (response){
        console.log(response.data);
        const zones = response.data;
        let html = '<ul>';
        const div = document.getElementById('apilist');
        zones.forEach(zone => {
            html += `<li>${zone.zoneID}, ${zone.name}, ${zone.description}</li>`;
        });    
            html += '</ul>';
            document.getElementById('apilist').innerHTML = html;
        
    })
    .catch(function(error){
        console.log(error);
    });
</script>