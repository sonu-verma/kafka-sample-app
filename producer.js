const express = require('express');
const request = require('request');


// ---------------------- For Post -----------

    var kafka = require("kafka-node"),
    Producer = kafka.Producer,
    client = new kafka.KafkaClient(),
    producer = new Producer(client);

    var producerReady = false;

    producer.on('ready', function () {
        producerReady = true;
    });
// ---------------------- For Post -----------


// ---------------------- For Post -----------
    const bodyParser = require('body-parser');
    const multer =  require('multer');
    let upload = multer();
// ---------------------- For Post -----------

    const app = express();

    app.use((req, res, next) => {
        res.header('Access-Control-Allow-Origin', '*');
        next();
    });

    app.use(bodyParser.json());
    app.use(bodyParser.urlencoded({ extended: true }));


    app.get('/posts', (req,res)  => {
        request(
            { url: 'https://joke-api-strict-cors.appspot.com/jokes/random' },
            (error, response, body) => {
                if (error || response.statusCode !== 200) {
                    return res.status(500).json({ type: 'error', message: err.message });
                }

                res.json(JSON.parse(body));
            }
        )
    });


    app.post('/save', upload.array(), (request, response) => {
        let formData = request.body;
        const payloads = [
            {topic: "users", messages: JSON.stringify(formData), partition: 0}
        ];

        try {

            if (Object.keys(formData).length > 0) {


                producer.send(payloads, function (err, data) {
                    if (err)  failedStatement(payloads);
                    console.log('Sent payloads to producer!', data);
                });

                response.send({'status': true, 'msg': 'Successfully send data into queue.'});
            } else {
                response.send({'status': false, 'msg': 'something went wrong.'});
            }

        }catch(e){
            failedStatement(payloads);
        }

    });


    function failedStatement(payloads){
        console.log('Ther is error ......redis management...',payloads);
    }

    app.listen(3000, function(){
         console.log("info",'Server is running at port : ' + 3000);
    });

