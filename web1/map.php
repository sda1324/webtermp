<div id=locsearchtitle style="margin-top:80px; margin-bottom:30px; border-bottom: 1px solid gray;">
    <img src="../img/placeholder.png" style="float:left; margin-right:20px">
    <h2> 매장찾기 </h2>
    <span> 가까운 지점을 찾아보세요 </span>
</div>

<div id=locsearchbody>
    <div id="map" style="width:1000px;height:500px;">
        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e3a3367204caa5c7d74a48ec1d6b9bb1"></script>
        <script>
            var container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
            var options = { //지도를 생성할 때 필요한 기본 옵션
                center: new daum.maps.LatLng(36.76379, 127.28266), //지도의 중심좌표.
                level: 4 //지도의 레벨(확대, 축소 정도)
            };

            var map = new daum.maps.Map(container, options); //지도 생성 및 객체 리턴

            var positions = [
                {
                    content: '카페 1호점',
                    latlng: new daum.maps.LatLng(36.76648, 127.28161)
                },
                {
                    content: '카페 2호점',
                    latlng: new daum.maps.LatLng(36.76082, 127.28155)
                }
            ];

            var imageSrc = "http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png";

            for (var i = 0; i < positions.length; i++) {

                // 마커 이미지의 이미지 크기 입니다
                var imageSize = new daum.maps.Size(24, 35);

                // 마커 이미지를 생성합니다    
                var markerImage = new daum.maps.MarkerImage(imageSrc, imageSize);

                // 마커를 생성합니다
                var marker = new daum.maps.Marker({
                    map: map, // 마커를 표시할 지도
                    position: positions[i].latlng, // 마커를 표시할 위치
                    title: positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
                    image: markerImage // 마커 이미지 
                });
                var infowindow = new daum.maps.InfoWindow({
                    content: positions[i].content // 인포윈도우에 표시할 내용
                });

                // 마커에 mouseover 이벤트와 mouseout 이벤트를 등록합니다
                // 이벤트 리스너로는 클로저를 만들어 등록합니다 
                // for문에서 클로저를 만들어 주지 않으면 마지막 마커에만 이벤트가 등록됩니다
                daum.maps.event.addListener(marker, 'mouseover', makeOverListener(map, marker, infowindow));
                daum.maps.event.addListener(marker, 'mouseout', makeOutListener(infowindow));
            }

            function makeOverListener(map, marker, infowindow) {
                return function () {
                    infowindow.open(map, marker);
                };
            }

            // 인포윈도우를 닫는 클로저를 만드는 함수입니다 
            function makeOutListener(infowindow) {
                return function () {
                    infowindow.close();
                };
            }

        </script>
    </div>
</div>