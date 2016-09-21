app.factory('dataFactory', function($http) {
  var myService = {
    httpRequest: function(url,method,params,dataPost,upload) {
      var passParameters = {};
      passParameters.url = url;

      if (typeof method == 'undefined'){
        passParameters.method = 'GET';
      }else{
        passParameters.method = method;
      }

      if (typeof params != 'undefined'){
        passParameters.params = params;
      }

      if (typeof dataPost != 'undefined'){
        passParameters.data = dataPost;
      }

      if (typeof upload != 'undefined'){
         passParameters.upload = upload;
      }

      var promise = $http(passParameters).then(function (response) {
        if(typeof response.data == 'string' && response.data != 1){
          if(response.data.substr('loginMark')){
              location.reload();
              return;
          }
          $.gritter.add({
            title: 'Application',
            text: response.data
          });
          return false;
        }
        if(response.data.jsMessage){
          $.gritter.add({
            title: response.data.jsTitle,
            text: response.data.jsMessage
          });
        }
        return response.data;
        
      },function(){

        $.gritter.add({
          title: 'Application',
          text: 'An error occured while processing your request.'
        });
      });
      return promise;
    }
  };
  return myService;
});

app.directive('validPasswordC', function() {
  return {
    require: 'ngModel',
    scope: {

      reference: '=validPasswordC'

    },
    link: function(scope, elm, attrs, ngModel) {
      ngModel.$validators.compareTo = function(modelValue) {
          return modelValue == scope.otherModelValue;
        };

        scope.$watch("reference", function() {
          ngModel.$validate();
        });
    }
  }
});

app.config(function($httpProvider) {
  $httpProvider.interceptors.push(function($q, $rootScope) {
    return {
      'request': function(config) {
          $rootScope.$broadcast('loading-started');
            return config || $q.when(config);
      },
      'response': function(response) {
        $rootScope.$broadcast('loading-complete');
          return response || $q.when(response);
      }
    };
  });
});

app.directive("loadingIndicator", function() {
  return {
    restrict : "A",
    template: "<div style='position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 9990;'><p align='center'><div style='z-index:1;position :relative;top:50px;' ><p align=center><img src='sistem/img/load.gif' width='70px' height='70px'/></p></div></div>",
    link : function(scope, element, attrs) {
      scope.$on("loading-started", function(e) {
        element.css({"display" : ""});
      });
      scope.$on("loading-complete", function(e) {
        element.css({"display" : "none"});
      });
    }
  };
});

app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
});

app.directive('fileModel', ['$parse', function($parse){
  return {
    restrict : 'A',
    link : function(scope, element, attrs){
      var model = $parse(attrs.fileModel);
      var modelSetter = model.assign;
      element.bind('change', function(){
        scope.$apply(function(){
          modelSetter(scope, element[0].files[0]);
        })
      })
    }

  }
}]);
