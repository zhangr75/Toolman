const individualLocation = ['So yummy', 43.25875194676521, -79.84498643707694];

function initMap(){
    
    const map = new google.maps.Map(document.getElementById("individualMap"),{
        zoom: 13.5, 
        center: new google.maps.LatLng(individualLocation[1], individualLocation[2])});
    const marker = new google.maps.Marker({position: new google.maps.LatLng(individualLocation[1], individualLocation[2]),
                                            map: map,
                                            title: individualLocation[0] });

}