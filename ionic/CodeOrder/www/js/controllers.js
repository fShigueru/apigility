angular.module('starter.controllers',[])
    .controller('LoginCtrl',['$scope','$http','$state','OAuth','OAuthToken',
        function($scope,$http,$state,OAuth,OAuthToken){
            $scope.login = function(data) {
                OAuth.getAccessToken(data).then(function() {
                    $state.go('tabs.orders');
                    //Pega as informações do token já registrados OAuthToken.getToken();
                }, function(data){
                    $scope.error_login = "Usuário ou senha inválido";
                });
            }
        }
    ])