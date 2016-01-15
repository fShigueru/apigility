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
    .controller('OrdersCtrl',['$scope','$http','$state',
        function ($scope,$http,$state) {
            $scope.getOrders = function() {
                $http.get('http://estudo.apigility.dev:8088/orders').then(
                    function(data){
                        $scope.orders = data.data._embedded.orders;
                        console.log($scope.orders);
                    }
                )
            };
            $scope.doRefresh = function () {
                $scope.getOrders();
                $scope.$broadcast('scroll.refreshComplete');
            };
            $scope.getOrders();

            $scope.onOrderDelete = function(data) {
                $http.delete('http://estudo.apigility.dev:8088/orders/' + data.id)
                .success(function (data) {
                    $scope.getOrders();
                })
                .error(function (data) {
                    $scope.error_delete =  "Erro ao excluir o pedido";
                });
            };
        }
    ])