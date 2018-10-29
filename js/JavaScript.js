var myData = [24,68,48,70,40,15,30];

var myConfig = {
    "graphset":[
        {
            "type":"bar",
            "title":{
                "text":"Data Pulled from MySQL Database"
            },
            "scale-x":{
                "labels":["Webster","Parnel","Dena","Tyrell","Martha","Summer","Linton"]
            },
            "series":[
                {
                    "values": myData
                }
            ]
        }
    ]
};

zingchart.render({
    id : 'myChart',
    data : myConfig,
    height : "100%",
    width: "100%"
});