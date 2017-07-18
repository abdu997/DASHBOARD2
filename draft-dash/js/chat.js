var app = angular.module('ChatSystem', []);

app.filter('unique', function() {
   return function(collection, keyname) { 
      var output = [], 
          keys = [];

      angular.forEach(collection, function(item) {
          var key = item[keyname];
          if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
          }
      });
      return output;
   };
});

app.controller('ChatController', function ($scope) {
//    DO NOT INCLUDE CURRENT USER THIS SCOPE IS FOR CHATROOM CREATE FORM
    $scope.members  = [
        "Abdul Amoud", "Youssef El-Khalili", "Swagat Ghimire"
    ]
    
    $scope.chatrooms = [
        {
            "chatroom_id": 1,
            "chatroom_name": "Development"
        },
        {
            "chatroom_id": 2,
            "chatroom_name": "Design"
        },
        {
            "chatroom_id": 3,
            "chatroom_name": "marketing"
        }
    ]
  
	$scope.messages = [
        {
            "message_id": "1",
            "chatroom_id": "1",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:00pm",
            "message": "Hello!"
        },
         {
            "message_id": "2",
            "chatroom_id": "2",
            "class": "smessage",
            "status": "sender",
            "sender": "Yousef",
            "timestamp": "Mon 8:50pm",
            "message": "Ho!"
        },
        {
            "message_id": "3",
            "chatroom_id": "2",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:40pm",
            "message": "jerk!"
        },
        {
            "message_id": "4",
            "chatroom_id": "1",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:00pm",
            "message": "why!"
        },
         {
            "message_id": "5",
            "chatroom_id": "2",
            "class": "smessage",
            "status": "sender",
            "sender": "Yousef",
            "timestamp": "Mon 8:50pm",
            "message": "no!"
        },
        {
            "message_id": "6",
            "chatroom_id": "3",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:40pm",
            "message": "yoyo!"
        },
	];

  $scope.chatRoomMsgs = function(id){
      var msgs = [];
      $("#clist").toggleClass("chat-list");
  
      angular.forEach($scope.messages, function(item) {
          var key = item['chatroom_id'];
          if(key == id) {
              msgs.push(item);
          }
      });

      $scope.chat = msgs;
  }

});