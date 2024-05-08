"use strict";

// initialize map
var map = new GMaps({
  div: '#map',
  lat: -8.210149,
  lng: 114.372151,
  zoom: 9
});
// Added markers to the map
map.addMarker({
  lat: -8.558557,
  lng: 114.049134,
  title: 'Pesanggaran',
  infoWindow: {
    content: '<h6>Pesanggaran</h6><p>Rekomendasi Tanaman Pangan : Kedelai</p>'
  }
});
map.addMarker({
  lat: -8.477425,
  lng: 114.068929,
  title: 'Siliragung',
  infoWindow: {
    content: '<h6>Siliragung</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
  }
});
map.addMarker({
  lat: -8.560094,
  lng: 114.201438,
  title: 'Bangorejo',
  infoWindow: {
    content: '<h6>Bangorejo</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
  }
});
map.addMarker({
    lat: -8.526788,
    lng: 114.240718,
    title: 'Purwoharjo',
    infoWindow: {
      content: '<h6>Purwoharjo</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
    }
  });
  map.addMarker({
    lat: -8.574783,
    lng: 114.329973,
    title: 'Tegaldlimo',
    infoWindow: {
      content: '<h6>Tegaldlimo</h6><p>Rekomendasi Tanaman Pangan : Padi</p>'
  }
  });
  map.addMarker({
    lat: -8.442559,
    lng: 114.299675,
    title: 'Muncar',
    infoWindow: {
      content: '<h6>Muncar</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
    }
  });
  map.addMarker({
    lat: -8.431676,
    lng: 114.251116,
    title: 'Cluring',
    infoWindow: {
      content: '<h6>Cluring</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
    }
  });
  map.addMarker({
      lat: -8.387200,
      lng: 114.152205,
      title: 'Gambiran',
      infoWindow: {
        content: '<h6>Gambiran</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
      }
    });
    map.addMarker({
        lat: -8.419956,
        lng: 114.123711,
        title: 'Tegalsari',
        infoWindow: {
          content: '<h6>Tegalsari</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
        }
      });
      map.addMarker({
        lat: -8.289570,
        lng: 114.059542,
        title: 'Glenmore',
        infoWindow: {
          content: '<h6>Glenmore</h6><p>Rekomendasi Tanaman Pangan : Kedelai</p>'
        }
      });
      map.addMarker({
        lat: -8.295692,
        lng: 113.985395,
        title: 'Kalibaru',
        infoWindow: {
          content: '<h6>Kalibaru</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
        }
      });
      map.addMarker({
          lat: -8.339610,
          lng: 114.127927,
          title: 'Genteng',
          infoWindow: {
            content: '<h6>Genteng</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
          }
        });
        map.addMarker({
          lat: -8.377674,
          lng: 114.257062,
          title: 'Srono',
          infoWindow: {
            content: '<h6>Srono</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
          }
        });
        map.addMarker({
          lat: -8.332185,
          lng: 114.312751,
          title: 'Rogojampi',
          infoWindow: {
            content: '<h6>Rogojampi</h6><p>Rekomendasi Tanaman Pangan : Padi</p>'
          }
        });
        map.addMarker({
          lat: -8.317327,
          lng: 114.352853,
          title: 'Blimbingsari',
          infoWindow: {
            content: '<h6>Blimbingsari</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
          }
        });
        map.addMarker({
            lat: -8.267266,
            lng: 114.314496,
            title: 'Kabat',
            infoWindow: {
              content: '<h6>Kabat</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
            }
          });
          map.addMarker({
            lat: -8.299284,
            lng: 114.240643,
            title: 'Singojuruh',
            infoWindow: {
              content: '<h6>Singojuruh</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
            }
          });
          map.addMarker({
            lat: -8.273576,
            lng: 114.152089,
            title: 'Sempu',
            infoWindow: {
              content: '<h6>Sempu</h6><p>Rekomendasi Tanaman Pangan : Padi</p>'
            }
          });
          map.addMarker({
            lat: -8.180522,
            lng: 114.152158,
            title: 'Songgon',
            infoWindow: {
              content: '<h6>Songgon</h6><p>Rekomendasi Tanaman Pangan : Padi</p>'
            }
          });
          map.addMarker({
              lat: -8.202940,
              lng: 114.300714,
              title: 'Glagah',
              infoWindow: {
                content: '<h6>Glagah</h6><p>Rekomendasi Tanaman Pangan : Padi</p>'
              }
            });
            map.addMarker({
              lat: -8.195871,
              lng: 114.260611,
              title: 'Licin',
              infoWindow: {
                content: '<h6>Licin</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
              }
            });
            map.addMarker({
              lat: -8.225675,
              lng: 114.371857,
              title: 'Banyuwangi',
              infoWindow: {
                content: '<h6>Banyuwangi</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
              }
            });
            map.addMarker({
              lat: -8.189153,
              lng: 114.329179,
              title: 'Giri',
              infoWindow: {
                content: '<h6>Giri</h6><p>Rekomendasi Tanaman Pangan : Jagung</p>'
              }
            });
            map.addMarker({
                lat: -8.148302,
                lng: 114.348673,
                title: 'Kalipuro',
                infoWindow: {
                  content: '<h6>Kalipuro</h6><p>Rekomendasi Tanaman Pangan : Kedelai</p>'
                }
              });
              map.addMarker({
                lat: -8.029729,
                lng: 114.307869,
                title: 'Wongsorejo',
                infoWindow: {
                  content: '<h6>Wongsorejo</h6><p>Rekomendasi Tanaman Pangan : Kedelai</p>'
                }
              });

