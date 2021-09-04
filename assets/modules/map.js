import L from "leaflet";
import "leaflet/dist/leaflet.css";

export default class Map {

    static init() {
      let map = document.querySelector("#map");
      if (map === null) {
        return;
      }

      let icon = L.icon({
        iconUrl: "/images/marker-icon.png",
      });

      let title = map.dataset.title;
      let center = [map.dataset.lat, map.dataset.lng];

      map = L.map("map").setView(center, 13);

      let token =
        "pk.eyJ1IjoicnJhaG1pIiwiYSI6ImNrc3l0MWRtcTJtcHUydW1kMG1oNnAyODMifQ.fIydG3Juxgda0Nc77lH7Pg";

      // https://stackoverflow.com/questions/37166172/mapbox-tiles-and-leafletjs
      /* tilelayer with mapbox */
      L.tileLayer(
        `https://api.mapbox.com/styles/v1/mapbox/streets-v9/tiles/{z}/{x}/{y}?access_token=${token}`,
        {
          maxZoom: 18,
          minZoom: 12,
          attribution:
            '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        }
      ).addTo(map);

      // default tilelayer
      /*
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);
        */

        L.marker(center, { icon: icon })
          .addTo(map)
          .bindPopup(title)
          .openPopup();
    }
}
