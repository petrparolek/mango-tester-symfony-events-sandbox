<?php declare(strict_types = 1);

namespace App\Events;

use App\Presenters\HomepagePresenter;
use Contributte\Events\Extra\Event\Application\PresenterStartupEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class TestFooSubscriber implements EventSubscriberInterface
{

	public function presenterStartup(PresenterStartupEvent $event): void
	{
		/** @var HomepagePresenter $presenter */
		$presenter = $event->getPresenter();

		$presenter->flashMessage('test', 'warning');
	}

	/**
	 * @return array<class-string, string>
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			PresenterStartupEvent::class => 'presenterStartup',
		];
	}

}
