<?php
namespace GamesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GamesBundle\Entity\Game;
use GamesBundle\Entity\Type;
use GamesBundle\Entity\Platform;
use GamesBundle\Entity\Screenshot;

class LoadGames implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
      $category_mobile = new Type();
      $category_mobile->setName("Mobile port");
      $category_mobile->setDescription("Originally designed for a mobile experience in portrait mode. Just imagine that your screen is a bigger smartphone.");
      $category_mobile->setIcon("mobile-icon.png");

      $category_pinball = new Type();
      $category_pinball->setName("Pinball game");
      $category_pinball->setDescription("Not as good as a real one, but a vertical screen is way more immersive for a pinball game.");
      $category_pinball->setIcon("flipper-icon.png");

      $category_shmup = new Type();
      $category_shmup->setName("Shoot'em up");
      $category_shmup->setDescription("If you're more into vertical schmups. <br>Pew pew pew !");
      $category_shmup->setIcon("shmup-icon.png");

      $category_other = new Type();
      $category_other->setName("Other games");
      $category_other->setDescription("You didn't expect these game to run in portrait mode, did you ?");
      $category_other->setIcon("other-games.png");

      $manager->persist($category_mobile);
      $manager->persist($category_pinball);
      $manager->persist($category_shmup);
      $manager->persist($category_other);

      $platform_steam = new Platform();
      $platform_steam->setName("Steam");
      $platform_steam->setDescription("Game available on Steam platform.");
      $platform_steam->setIcon("steam-icon.png");

      $platform_arcade = new Platform();
      $platform_arcade->setName("Arcade (emulation)");
      $platform_arcade->setDescription("An arcade game suitable for vertical mode. You must use an emulator and find the rom by yourself to play it.");
      $platform_arcade->setIcon("arcade-icon.png");

      $manager->persist($platform_steam);
      $manager->persist($platform_arcade);

      $screenshot1 = new Screenshot();
      $screenshot1->setUrl("pinballfx2_1.png");
      $screenshot1->setUrlCaption("pinballfx2_small_1.png");
      $screenshot1->setAlt("A screenshot in portrait mode.");

      $screenshot2 = new Screenshot();
      $screenshot2->setUrl("pinballfx2_2.png");
      $screenshot2->setUrlCaption("pinballfx2_small_2.png");
      $screenshot2->setAlt("A screenshot in portrait mode.");

      $manager->persist($screenshot1);
      $manager->persist($screenshot2);

      $screenshot3 = new Screenshot();
      $screenshot3->setUrl("ikaruga_1.png");
      $screenshot3->setUrlCaption("ikaruga_small_1.png");
      $screenshot3->setAlt("A screenshot in portrait mode.");

      $screenshot4 = new Screenshot();
      $screenshot4->setUrl("ikaruga_2.png");
      $screenshot4->setUrlCaption("ikaruga_small_2.png");
      $screenshot4->setAlt("A screenshot in portrait mode.");

      $manager->persist($screenshot3);
      $manager->persist($screenshot4);

      $screenshot5 = new Screenshot();
      $screenshot5->setUrl("downwell_1.png");
      $screenshot5->setUrlCaption("downwell_small_1.png");
      $screenshot5->setAlt("A screenshot in portrait mode.");

      $screenshot6 = new Screenshot();
      $screenshot6->setUrl("downwell_2.png");
      $screenshot6->setUrlCaption("downwell_small_2.png");
      $screenshot6->setAlt("A screenshot in portrait mode.");

      $manager->persist($screenshot5);
      $manager->persist($screenshot6);


      $game1 = new Game();
      $game1->setName("Pinball FX 2");
      $game1->setDescription("A classic pinball game !");
      $game1->setWhy("More like a real one.");
      $game1->setIsValid(true);
      $game1->setType($category_pinball);
      $game1->addScreenshot($screenshot1);
      $game1->addScreenshot($screenshot2);
      $game1->setPlatform($platform_steam);

      $game2 = new Game();
      $game2->setName("Ikaruga");
      $game2->setDescription("Shoot! Dodge! and... Get Hit!?");
      $game2->setWhy("It looks good.");
      $game2->setIsValid(true);
      $game2->setType($category_shmup);
      $game2->addScreenshot($screenshot3);
      $game2->addScreenshot($screenshot4);
      $game2->setPlatform($platform_steam);

      $game3 = new Game();
      $game3->setName("Downwell");
      $game3->setDescription("Downwell is a curious game about a young person venturing down a well in search of untold treasures with only his Gunboots to protect him.");
      $game3->setWhy("It looks good.");
      $game3->setIsValid(true);
      $game3->setType($category_other);
      $game3->addScreenshot($screenshot5);
      $game3->addScreenshot($screenshot6);
      $game3->setPlatform($platform_steam);

      $manager->persist($game1);
      $manager->persist($game2);
      $manager->persist($game3);
      
      $manager->flush();
  }
}
