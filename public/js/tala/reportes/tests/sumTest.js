// Create a new YUI instance and populate it with the required modules.
YUI({
    logInclude: { TestRunner: true }
}).use('test', 'test-console', function (Y) {

    var testCase = new Y.Test.Case({
        name: "Test de Sumar",
        testSomething: function () {
            Y.Assert.areSame(sumar(2, 2), 4, 'Error');
        }
    });
    Y.Test.Runner.add(testCase);
    (new Y.Test.Console({
        newestOnTop: false
    })).render('#log');
    Y.Test.Runner.run();
});