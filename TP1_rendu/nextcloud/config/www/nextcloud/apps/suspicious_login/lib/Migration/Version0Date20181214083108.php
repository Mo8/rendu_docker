<?php

declare(strict_types=1);

/**
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\SuspiciousLogin\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version0Date20181214083108 extends SimpleMigrationStep {

	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 *
	 * @return ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		$table = $schema->getTable('suspicious_login_model');
		$table->getColumn('type')
			->setLength(128);
		$table->getColumn('learning_rate')
			->setPrecision(10)
			->setDefault(null)
			->setScale(5);
		$table->getColumn('precision_y')
			->setPrecision(10)
			->setDefault(null)
			->setScale(5);
		$table->getColumn('precision_n')
			->setPrecision(10)
			->setDefault(null)
			->setScale(5);
		$table->getColumn('recall_y')
			->setPrecision(10)
			->setDefault(null)
			->setScale(5);
		$table->getColumn('recall_n')
			->setPrecision(10)
			->setDefault(null)
			->setScale(5);

		return $schema;
	}
}
