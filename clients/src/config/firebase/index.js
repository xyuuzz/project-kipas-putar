import firebase from "firebase/app";
import "firebase/storage";

// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDCAlQ62Fe7LZN9cQxQsto7MP-9zFz-8aY",
  authDomain: "kipas-putar.firebaseapp.com",
  projectId: "kipas-putar",
  storageBucket: "kipas-putar.appspot.com",
  messagingSenderId: "868026800001",
  appId: "1:868026800001:web:3c256ed4c7b989032a3a80",
  measurementId: "G-EG56FKQ8W6",
};

firebase.initializeApp(firebaseConfig);

// Call and use firebase services => Storage
const storage = firebase.storage();

export { storage, firebase as default };
