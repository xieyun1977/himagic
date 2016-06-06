/*
交通指南
@互动力 麻柯柯 2013.05.27
*/
var map_type = "bus";
var txtStart = "";
var map = new BMap.Map("container"); //建树Map实例
var point = new BMap.Point(118.831269, 31.931955); // 建树点坐标
map.centerAndZoom(point, 18); // 初始化地图,设置中心点坐标和地图级别。
//地图事件设置函数：
map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
map.enableKeyboard(); //启用键盘上下左右键移动地图

//向地图中添加缩放控件
var ctrl_nav = new BMap.NavigationControl({ anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE });
map.addControl(ctrl_nav);
//向地图中添加缩略图控件
var ctrl_ove = new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 });
map.addControl(ctrl_ove);
//向地图中添加比例尺控件
var ctrl_sca = new BMap.ScaleControl({ anchor: BMAP_ANCHOR_BOTTOM_LEFT });
map.addControl(ctrl_sca);
//标注点数组
var markerArr = [{ title: "魔法城", content: "地址：南京市江宁区秣陵街道 双龙大道1539号现代城		", point: "118.831269|31.931955", isOpen: 0, icon: { w: 21, h: 21, l: 46, t: 0, x: 6, lb: 5 } }
];
//创建marker
function addMarker() {
    for (var i = 0; i < markerArr.length; i++) {
        var json = markerArr[i];
        var p0 = json.point.split("|")[0];
        var p1 = json.point.split("|")[1];
        var point = new BMap.Point(p0, p1);
        var iconImg = createIcon(json.icon);
        var marker = new BMap.Marker(point, { icon: iconImg });
        var iw = createInfoWindow(i);
        var label = new BMap.Label(json.title, { "offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20) });
        marker.setLabel(label);
        map.addOverlay(marker);
        label.setStyle({
            borderColor: "#808080",
            color: "#333",
            cursor: "pointer"
        });

        (function () {
            var index = i;
            var _iw = createInfoWindow(i);
            var _marker = marker;
            _marker.addEventListener("click", function () {
                this.openInfoWindow(_iw);
            });
            _iw.addEventListener("open", function () {
                _marker.getLabel().hide();
            })
            _iw.addEventListener("close", function () {
                _marker.getLabel().show();
            })
            label.addEventListener("click", function () {
                _marker.openInfoWindow(_iw);
            })
            if (!!json.isOpen) {
                label.hide();
                _marker.openInfoWindow(_iw);
            }
        })()
    }
}
//创建InfoWindow
function createInfoWindow(i) {
    var json = markerArr[i];
    var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content' style=\"font-size:12px; width:200px;\">" + json.content + "</div>");
    return iw;
}
//创建一个Icon
function createIcon(json) {
    var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), { imageOffset: new BMap.Size(-json.l, -json.t), infoWindowOffset: new BMap.Size(json.lb + 5, 1), offset: new BMap.Size(json.x, json.h) })
    return icon;
}
addMarker();
var startInfowin = new BMap.InfoWindow("<p class='t-c'><input value='选为出发点' type='button' class='Ticbtn' onclick='startDeter();' /></p>");
var startResults = null;
var startPoint;
//创建公交查询的实例
var bus = new BMap.TransitRoute(map, { renderOptions: { map: map, panel: "drivingPanel" } });
//创建驾车查询的实例
var driving = new BMap.DrivingRoute(map, { renderOptions: { map: map, autoViewport: true, panel: "drivingPanel" } });
var startOption = {
    onSearchComplete: function (results) {
        // 判定情况是否是准确
        if (busSearch.getStatus() == BMAP_STATUS_SUCCESS) {
            startResults = results;
            var s = [];
            for (var i = 0; i < results.getCurrentNumPois() ; i++) {
                s.push("<div style=\"line-height:24px; padding-left:12px;\"><a onmouseover='map.openInfoWindow(startInfowin,startResults.getPoi(" + i + ").point);' onclick='startDeter();' href='javascript:void(0)'>");
                s.push(results.getPoi(i).title);
                s.push("</a>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color:gray;\">");
                s.push(results.getPoi(i).address);
                s.push("</span></div>");
            }
            document.getElementById("startPanel").innerHTML = s.join("");
        } else { startResults = null; }
    }
};
//建树1个搜刮实例
var busSearch = new BMap.LocalSearch(map, startOption);
//查询地图(公交查询)
function Bus_Search() {
    var startPlace = document.getElementById("txtStart").value;
    if (startPlace == "") {
        alert("亲，请输入您的起点吧~");
        return;
    }
    busSearch.search(startPlace);
    document.getElementById("box").style.display = "block";
    //location.hash = "abc";
}
//查询地图(自驾查询)
function Driving_Search() {
    var startPlace = document.getElementById("txtStart").value;
    if (startPlace == "") {
        alert("亲，请输入您的起点吧~");
        return;
    }
    busSearch.search(startPlace);
    document.getElementById("box").style.display = "block";
    //location.hash = "abc";
}
//点击某一个出发点查询地图
function startDeter() {
    map.clearOverlays();
    document.getElementById("drivingPanel").style.display = "block";
    startPoint = startInfowin.getPosition();
    var marker = new BMap.Marker(startPoint);
    map.addOverlay(marker);
    if (map_type == "driving") {
        driving.search(startPoint, point);
    } else {
        bus.search(startPoint, point);
    }
    resetHeight();
    Close();
}
//建立一个自动完成的对象
var ac = new BMap.Autocomplete(
    { "input": "txtStart", "location": map });

//鼠标放在下拉列表上的事件
ac.addEventListener("onhighlight", function (e) {
    var str = "";
    var _value = e.fromitem.value;
    var value = "";
    if (e.fromitem.index > -1) {
        value = _value.province + _value.city + _value.district + _value.street + _value.business;
    }
    str = "FromItemindex = " + e.fromitem.index + "value = " + value;
});
//选择出发点 展开
function Open() {
    document.getElementById('startPanel').style.display = 'block';
    document.getElementById("a_open").style.display = "none";
    document.getElementById("a_close").style.display = "block";
}
//选择出发点 收缩
function Close() {
    document.getElementById('startPanel').style.display = 'none';
    document.getElementById("a_open").style.display = "block";
    document.getElementById("a_close").style.display = "none";
}
//触发键盘事件，当用户输入出发地，并按下Enter键后触发
function hotkey(e) {
    var ev = window.event || e;
    if (ev.keyCode == 13) {
        if (map_type == "driving") {
            Driving_Search();
        }
        else {
            Bus_Search();
        }
        document.getElementById("drivingPanel").style.display = "none";
        Open();
    }
}
//触发鼠标事件，当用户点击查询后触发
function map_Search() {
    if (map_type == "driving") {
        Driving_Search();
    }
    else {
        Bus_Search();
    }
    document.getElementById("drivingPanel").style.display = "none";
    Open();
}
//判断当前查询类型
function bus_Search() {
    map_type = "bus";
    document.getElementById("drivingPanel").style.display = "none";
    Open();
}
//判断当前查询类型
function driving_Search() {
    map_type = "driving";
    document.getElementById("drivingPanel").style.display = "none";
    Open();
}
function resetHeight() {
    setTimeout(function () { document.getElementById("tra_pri_wrap").style.height = document.getElementsByClassName("tra_con")[0].offsetHeight + "px"; }, 1000);
}