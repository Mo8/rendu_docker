<?php

declare(strict_types=1);
/**
 * @copyright Copyright 2022 Carl Schwan <carl@carlschwan.eu>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Metadata;

use OCP\AppFramework\Db\Entity;
use OCP\DB\Types;

/**
 * @method string getGroupName()
 * @method void setGroupName(string $groupName)
 * @method array getMetadata()
 * @method void setMetadata(array $metadata)
 * @see \OC\Core\Migrations\Version240000Date20220404230027
 */
class FileMetadata extends Entity {
	protected ?string $groupName = null;
	protected ?array $metadata = null;

	public function __construct() {
		$this->addType('groupName', 'string');
		$this->addType('metadata', Types::JSON);
	}
}
