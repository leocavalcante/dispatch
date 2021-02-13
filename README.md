# dispatch()

🕊️ Event dispatcher awareness made simple.

## Install

```shell
composer require leocavalcante/dispatch:dev-main
```

## Usage

### Define a dispatcher

It can be anyone that implements the [PSR-14 Event Dispatcher Interface](https://www.php-fig.org/psr/psr-14/).

```shell
use function Dispatch\use_dispatcher;
use_dispatcher(Psr\EventDispatcher\EventDispatcherInterface);
```

### Then just call `dispatch()`

```shell
use function Dispatch\dispatch;
dispatch(new MyEvent());
```

The idea is exactly to make it able to dispatch events from anywhere in your code avoiding `EventDispatcherInterface` injection boilerplate.

## Dispatchers

As said, this is only a small Facade on top of `EventDispatcherInterface` providing namespaced functions to reduce dispatcher injection boilerplate.

You still need a concrete implementation of an Event Dispatcher, anyone that implements the `EventDispatcherInterface` can be used, but here is a list of a few of them:

- [The PHP League Event](https://event.thephpleague.com/) (my personal favorite and used on the tests)
- [Laminas EventManager](https://docs.laminas.dev/laminas-eventmanager/)
- [Symfony EventDispatcher](https://symfony.com/doc/current/components/event_dispatcher.html)
- [Doctrine Event Manager](https://www.doctrine-project.org/projects/event-manager.html)
- ~~[Événement](https://github.com/igorw/evenement/issues/73)~~

## FAQ

### Does it compromise my tests?

**It shouldn't**. Unless you are testing that your module (class, function, method etc) is dispatching an Event, than it does not interfere the module's behavior.

#### In case you want to test if the module is dispatching an Event.

And want to inject your fixture/stub/mock for `EventDispatcherInterface`, you can always just call `use_dispatcher()` in the test code or test setup.
*The tricky part is that this dispatcher will be used globally all along.*
But you can always call `desuse_dispatcher()` from your tests teardown.

### Doesn't it make my module dependency implicit?

**Yes, it does**. You have to think about `dispatch()` as like a PHP core/built-in function and as if event dispatching is a core part of your application. You model your domain on top of it.

**But remember**, it depends on `EventDispatcherInterface` **only**! It is an interface that can receive any concrete implementation **and** is a accepted and consolidated PSR interface.

### Conclusion

Trade-offs you should accept to pay are:

- The extra handling of the global `EventDispatcherInterface` on tests that should be isolated.
- Vendor lock-in on this project as if it is a superset of PHP, since you will be not injecting interfaces.
*Unless you create your own `dispatch()` function under the `Dispatch` namespace (that is why this namespace name is so generic).*

If these are ok to you. **Happy coding!** I'm sure it will make your event-driven apps pleasant to code with reduce boilerplate.

## Inspired by

- [Event Dispatcher Aware](https://event.thephpleague.com/3.0/extra-utilities/event-dispatcher-aware/)
