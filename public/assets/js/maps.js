var map;
var marker;
var infowindow;
// Load Maps
async function initMap() {
	if (document.getElementById("maps")) {
		map = new google.maps.Map(document.getElementById("maps"), {
			zoom: 13,
			center: {
				lat: -10.1749491,
				lng: 123.5796987,
			},
		});

		// get Json from controller
		let dataLoc = await getLoc(`http://localhost:8080/admin/lokasi`);
    console.log('test');
		// with attr data-id
		if (document.getElementById("maps").dataset.id) {
			dataLoc.forEach((dl) => {
				if (dl.idDokter == document.getElementById("maps").dataset.id) {
					addMarker(dl);
				}
			});
		}

		// without attr data-id
		if (!document.getElementById("maps").dataset.id) {
			dataLoc.forEach((dl) => {
				addMarker(dl);
			});
		}
	}
}

// GET Data From Controller
function getLoc(url = "") {
	return fetch(url)
		.then((response) => {
			if (response.status == 200) {
				return response.json();
			} else {
				throw new Error(`Something Went Wrong !!!`);
			}
		})
		.then((response) => response)
		.catch((error) => console.log(error));
}

// function Marker

function addMarker(props) {
	// add marker
	marker = new google.maps.Marker({
		position: {
			lat: parseFloat(props.latitude),
			lng: parseFloat(props.longitude),
		},
		// icon: `pub/assets/marker.png`,
		map: map,
	});
	// popup window
	infowindow = new google.maps.InfoWindow();
	// event listener Popup Window
	marker.addListener("click", function (event) {
		infowindow.close();
		infowindow.open(map, marker);
		infowindow.setContent(content(props));
		infowindow.setPosition(event.latLng);
	});

	// filter : add event handler when looping
	if (document.querySelector("#kelurahan #kategori")) {
		filter(props, marker);
	}
}

// content popup fn
function content(data) {
	return `<div class="card">
				<div class="card-body">
					<h6>Kelurahan ${data.namaKelurahan}</h6>
					<p>Alamat : ${data.alamat}</p>
					<p>Penyebab : ${data.penyebab}</p>
					<a href="http://localhost/admin/lokasi/detail/${data.id}">Detail</a>
				</div>
			  </div>`;
}

function filter(data, marker) {
  console.log(data);
	const searchBtn = document.querySelector("#search");
	searchBtn.addEventListener("click", function () {
		const kelurahan = document.querySelector("#kelurahan #kategori").value;

			if (data.idKelurahan == kelurahan) {
				marker.setVisible(true);
			} else if (kelurahan == 0) {
				marker.setVisible(true);
			} else {
				marker.setVisible(false);
			}
	});
}
