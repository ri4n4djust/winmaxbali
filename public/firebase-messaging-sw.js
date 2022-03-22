// Add Firebase products that you want to use
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

// Firebase SDK
firebase.initializeApp({
    apiKey: "AIzaSyBSa5ADouGl6BR4Qc8NO8gSyHsBqTXQewg",
        authDomain: "laravelnotif.firebaseapp.com",
        databaseURL: "https://laravelnotif-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "laravelnotif",
        storageBucket: "laravelnotif.appspot.com",
        messagingSenderId: "773446090612",
        appId: "1:773446090612:web:a8d23e0f1c6afa0a2a3621",
        measurementId: "G-SF60Q7Z149"
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message has received : ", payload);
    const title = "First, solve the problem.";
    const options = {
        body: "Push notificaiton!",
        icon: "/icon.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});