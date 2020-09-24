var wms_layers = [];

        var lyr_GoogleSatellite_0 = new ol.layer.Tile({
            'title': 'Google Satellite',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: '<a href="https://www.google.at/permissions/geoguidelines/attr-guide.html">Map data ©2015 Google</a>',
                url: 'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}'
            })
        });
        var lyr_OpenStreetMap_1 = new ol.layer.Tile({
            'title': 'OpenStreetMap',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: '<a href=""></a>',
                url: 'http://a.tile.openstreetmap.org/{z}/{x}/{y}.png'
            })
        });
        var lyr_ESRISatellite_2 = new ol.layer.Tile({
            'title': 'ESRI Satellite',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: '<a href=""></a>',
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
            })
        });var format_BatasKecamatan_3 = new ol.format.GeoJSON();
var features_BatasKecamatan_3 = format_BatasKecamatan_3.readFeatures(json_BatasKecamatan_3, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_BatasKecamatan_3 = new ol.source.Vector({
    attributions: '<a href=""></a>',
});
jsonSource_BatasKecamatan_3.addFeatures(features_BatasKecamatan_3);var lyr_BatasKecamatan_3 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_BatasKecamatan_3, 
                style: style_BatasKecamatan_3,
                title: '<img src="styles/legend/BatasKecamatan_3.png" /> Batas Kecamatan'
            });var format_BatasKelurahan_4 = new ol.format.GeoJSON();
var features_BatasKelurahan_4 = format_BatasKelurahan_4.readFeatures(json_BatasKelurahan_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_BatasKelurahan_4 = new ol.source.Vector({
    attributions: '<a href=""></a>',
});
jsonSource_BatasKelurahan_4.addFeatures(features_BatasKelurahan_4);var lyr_BatasKelurahan_4 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_BatasKelurahan_4, 
                style: style_BatasKelurahan_4,
                title: '<img src="styles/legend/BatasKelurahan_4.png" /> Batas Kelurahan'
            });

lyr_GoogleSatellite_0.setVisible(true);lyr_OpenStreetMap_1.setVisible(true);lyr_ESRISatellite_2.setVisible(true);lyr_BatasKecamatan_3.setVisible(true);lyr_BatasKelurahan_4.setVisible(true);
var layersList = [lyr_GoogleSatellite_0,lyr_OpenStreetMap_1,lyr_ESRISatellite_2,lyr_BatasKecamatan_3,lyr_BatasKelurahan_4];
lyr_BatasKecamatan_3.set('fieldAliases', {'COUNT': 'COUNT', 'KECAMATANN': 'KECAMATANN', });
lyr_BatasKelurahan_4.set('fieldAliases', {'ID': 'ID', 'AREA_METER': 'AREA_METER', 'PERIMETER_': 'PERIMETER_', 'HECTARES_': 'HECTARES_', 'ID_': 'ID_', 'ACRES_': 'ACRES_', 'AREA_METER_1': 'AREA_METER_1', 'PERIMETER__1': 'PERIMETER__1', 'ACRES': 'ACRES', 'HECTARES': 'HECTARES', 'KELURAHAN': 'KELURAHAN', 'KECAMATAN': 'KECAMATAN', 'LENGTH': 'LENGTH', });
lyr_BatasKecamatan_3.set('fieldImages', {'COUNT': 'TextEdit', 'KECAMATANN': 'TextEdit', });
lyr_BatasKelurahan_4.set('fieldImages', {'ID': 'TextEdit', 'AREA_METER': 'TextEdit', 'PERIMETER_': 'TextEdit', 'HECTARES_': 'TextEdit', 'ID_': 'Range', 'ACRES_': 'TextEdit', 'AREA_METER_1': 'TextEdit', 'PERIMETER__1': 'TextEdit', 'ACRES': 'TextEdit', 'HECTARES': 'TextEdit', 'KELURAHAN': 'TextEdit', 'KECAMATAN': 'TextEdit', 'LENGTH': 'TextEdit', });
lyr_BatasKecamatan_3.set('fieldLabels', {'COUNT': 'inline label', 'KECAMATANN': 'inline label', });
lyr_BatasKelurahan_4.set('fieldLabels', {'ID': 'inline label', 'AREA_METER': 'inline label', 'PERIMETER_': 'inline label', 'HECTARES_': 'inline label', 'ID_': 'inline label', 'ACRES_': 'inline label', 'AREA_METER_1': 'inline label', 'PERIMETER__1': 'inline label', 'ACRES': 'header label', 'HECTARES': 'inline label', 'KELURAHAN': 'inline label', 'KECAMATAN': 'inline label', 'LENGTH': 'inline label', });
lyr_BatasKelurahan_4.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});