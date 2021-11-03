function initMap() {
                var map = new google.maps.Map(document.getElementById("map"),{zoom: 13.5, center: location});
                var bounds = new google.maps.LatLngBounds();

                var location= [
                /**{
                    "title": 'Coco MilkTea',
                    "lat": '43.2543927046955',
                    "lng": '-79.86604390141395',
                    "description": 'asdafwrfqwetfwe'
                    "address": ''
                }**/
                ['Coco MilkTea', 43.2543927046955, -79.86604390141395],
                ['The Ship', 43.25221779075225, -79.8699729075916]
                ]

                var infoWindowContent = [
                ['<div class="info_content">' +
                '<h3>Coco MilkTea</h3>' +
                '<p>Address: 96 Main St E, Hamilton, ON L8N 1G3</p>' + '</div>'],
                ['<div class="info_content">' +
                '<h3>The Ship</h3>' +
                '<p>Address: 23 Augusta St, Hamilton, ON L8N 1P2</p>' +
                '</div>']
                ]

                var infoWindow = new google.maps.InfoWindow(), maker, i;

                for( i = 0; i < location.length; i++ ) {
                var position = new google.maps.LatLng(location[i][1], location[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: location[i][0]
                });
                
                // Add info window to marker    
                google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));

                google.maps.event.addListener(marker, 'mouseout', function(){
                        infoWindow.close();
                    });

                // Center the map
                map.fitBounds(bounds);
                }
                
                }
                // Load initialize function
                google.maps.event.addDomListener(window, 'load', initMap);