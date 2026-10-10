<?php

declare(strict_types=1);

namespace App\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'test',
    description: 'Check cli command.', // the command description shown when running "php bin/console list"
    help: 'This command allows you to create a user...', // the command help shown when running the command with the "--help" option
)]
class HomeCommand extends Command
{
    public function __invoke(OutputInterface $output): int
    {

        $output->writeln('<info>test</info>');
        // $input->writeln('test');

        // ... введите здесь код, чтобы создать пользователя

        // этот метод должен вернуть целое число с "кодом завершения"
        // команды. Вы также можете использовать это константы, чтобы сделать код более читаемым

        // вернуть это, если при выполнении команды не было проблем
        // (эквивалентно возвращению int(0))
        return Command::SUCCESS;

        // или вернуть это, если во время выполнения возникла ошибка
        // (эквивалентно возвращению int(1))
        // return Command::FAILURE;

        // или вернуть это, чтобы указать на неправильное использование команды, например, невалидные опции
        // или отсутствующие аргументы (равноценно возвращению int(2))
        // return Command::INVALID
    }
}
