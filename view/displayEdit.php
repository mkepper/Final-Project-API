<!--This forms function is to create a dropdown using the API call of all available entries in the API
Then the user can select one of the entries and edit it-->

<form action="." method="POST"> 
    <select name="timeZone" id="timeZones">
        <script>
            axios.get('model/timeZoneApi.php')
            .then(function (response){
                console.log(response.data);
                const zones = response.data;
                const select = document.getElementById('timeZones');
                zones.forEach(zone => {
                    const option = document.createElement('option');
                    option.value = zone.zoneID;
                    option.text = `${zone.name} ${zone.description}`;
                    select.add(option);
                });
            })
            .catch(function(error){
                console.log(error);
            });
        </script>
    </select>
    <input type="Submit" value="Edit">
    <input type="hidden" name="action" value="edit">
</form>