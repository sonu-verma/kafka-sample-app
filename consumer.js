var kafka = require("kafka-node"),
    Consumer = kafka.Consumer,
    client = new kafka.KafkaClient(),
    consumer = new Consumer(client, [{ topic: "users", partition: 0 }], {
        autoCommit: true
    });

var mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    user: "user",
    password: "root",
    database: "kafka_app"
});


// ------------------------- Redis --------------


let redis     = require('redis'),
    /* Values are hard-coded for this example, it's usually best to bring these in via file or environment variable for production */
    redis_client    = redis.createClient({
        port      : 6379,               // replace with your port
        host      : '127.0.0.1',        // replace with your hostanme or IP address
        // password  : 'your password',    // replace with your password
    });



    redis_client.on('error', (err) => {
        console.log("Error " + err)
    });

// ------------------------- Redis --------------



con.connect(function(err) {
    if (err) throw err;
    console.log('connected with db.')
});

consumer.on("message", function(message) {
    obj = JSON.parse(message.value);
    if(obj !== null){

        var sql = "INSERT INTO users (fname,username,email,password,gender,company) VALUES ('"+obj.name+"','"+obj.username+"','"+obj.email+"','"+obj.password1+"','"+obj.gender+"','"+obj.company+"')";

        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log('inserted');
            redis_client.set('users_'+obj.username , JSON.stringify(obj) ,function(err) {
                if (err) {
                    console.log('error', err);
                    throw err; /* in production, handle errors more gracefully */
                } else {
                    // console.log('success',);
                    redis_client.get('users_'+obj.username , function (err, value) {
                            if (err) {
                                throw err;
                            } else {
                                console.log(value);
                            }
                        }
                    );
                }
            });
        });
    }

});



consumer.on('error', function(err) {
    console.log('error', err);
});
