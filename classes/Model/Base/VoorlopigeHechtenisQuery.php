<?php

namespace Model\Custom\NovumJenv\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumJenv\VoorlopigeHechtenis as ChildVoorlopigeHechtenis;
use Model\Custom\NovumJenv\VoorlopigeHechtenisQuery as ChildVoorlopigeHechtenisQuery;
use Model\Custom\NovumJenv\Map\VoorlopigeHechtenisTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'voorlopige_hechtenis' table.
 *
 *
 *
 * @method     ChildVoorlopigeHechtenisQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVoorlopigeHechtenisQuery orderByPersoonId($order = Criteria::ASC) Order by the persoon_id column
 * @method     ChildVoorlopigeHechtenisQuery orderByInVoorlopigeHechtenis($order = Criteria::ASC) Order by the in_voorlopige_hechtenis column
 * @method     ChildVoorlopigeHechtenisQuery orderByEindDatum($order = Criteria::ASC) Order by the eind_datum column
 *
 * @method     ChildVoorlopigeHechtenisQuery groupById() Group by the id column
 * @method     ChildVoorlopigeHechtenisQuery groupByPersoonId() Group by the persoon_id column
 * @method     ChildVoorlopigeHechtenisQuery groupByInVoorlopigeHechtenis() Group by the in_voorlopige_hechtenis column
 * @method     ChildVoorlopigeHechtenisQuery groupByEindDatum() Group by the eind_datum column
 *
 * @method     ChildVoorlopigeHechtenisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVoorlopigeHechtenisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVoorlopigeHechtenisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVoorlopigeHechtenisQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVoorlopigeHechtenisQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVoorlopigeHechtenisQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVoorlopigeHechtenisQuery leftJoinPersoon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persoon relation
 * @method     ChildVoorlopigeHechtenisQuery rightJoinPersoon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persoon relation
 * @method     ChildVoorlopigeHechtenisQuery innerJoinPersoon($relationAlias = null) Adds a INNER JOIN clause to the query using the Persoon relation
 *
 * @method     ChildVoorlopigeHechtenisQuery joinWithPersoon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persoon relation
 *
 * @method     ChildVoorlopigeHechtenisQuery leftJoinWithPersoon() Adds a LEFT JOIN clause and with to the query using the Persoon relation
 * @method     ChildVoorlopigeHechtenisQuery rightJoinWithPersoon() Adds a RIGHT JOIN clause and with to the query using the Persoon relation
 * @method     ChildVoorlopigeHechtenisQuery innerJoinWithPersoon() Adds a INNER JOIN clause and with to the query using the Persoon relation
 *
 * @method     \Model\Custom\NovumJenv\PersoonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildVoorlopigeHechtenis findOne(ConnectionInterface $con = null) Return the first ChildVoorlopigeHechtenis matching the query
 * @method     ChildVoorlopigeHechtenis findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVoorlopigeHechtenis matching the query, or a new ChildVoorlopigeHechtenis object populated from the query conditions when no match is found
 *
 * @method     ChildVoorlopigeHechtenis findOneById(int $id) Return the first ChildVoorlopigeHechtenis filtered by the id column
 * @method     ChildVoorlopigeHechtenis findOneByPersoonId(int $persoon_id) Return the first ChildVoorlopigeHechtenis filtered by the persoon_id column
 * @method     ChildVoorlopigeHechtenis findOneByInVoorlopigeHechtenis(boolean $in_voorlopige_hechtenis) Return the first ChildVoorlopigeHechtenis filtered by the in_voorlopige_hechtenis column
 * @method     ChildVoorlopigeHechtenis findOneByEindDatum(string $eind_datum) Return the first ChildVoorlopigeHechtenis filtered by the eind_datum column *

 * @method     ChildVoorlopigeHechtenis requirePk($key, ConnectionInterface $con = null) Return the ChildVoorlopigeHechtenis by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoorlopigeHechtenis requireOne(ConnectionInterface $con = null) Return the first ChildVoorlopigeHechtenis matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVoorlopigeHechtenis requireOneById(int $id) Return the first ChildVoorlopigeHechtenis filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoorlopigeHechtenis requireOneByPersoonId(int $persoon_id) Return the first ChildVoorlopigeHechtenis filtered by the persoon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoorlopigeHechtenis requireOneByInVoorlopigeHechtenis(boolean $in_voorlopige_hechtenis) Return the first ChildVoorlopigeHechtenis filtered by the in_voorlopige_hechtenis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoorlopigeHechtenis requireOneByEindDatum(string $eind_datum) Return the first ChildVoorlopigeHechtenis filtered by the eind_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVoorlopigeHechtenis[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVoorlopigeHechtenis objects based on current ModelCriteria
 * @method     ChildVoorlopigeHechtenis[]|ObjectCollection findById(int $id) Return ChildVoorlopigeHechtenis objects filtered by the id column
 * @method     ChildVoorlopigeHechtenis[]|ObjectCollection findByPersoonId(int $persoon_id) Return ChildVoorlopigeHechtenis objects filtered by the persoon_id column
 * @method     ChildVoorlopigeHechtenis[]|ObjectCollection findByInVoorlopigeHechtenis(boolean $in_voorlopige_hechtenis) Return ChildVoorlopigeHechtenis objects filtered by the in_voorlopige_hechtenis column
 * @method     ChildVoorlopigeHechtenis[]|ObjectCollection findByEindDatum(string $eind_datum) Return ChildVoorlopigeHechtenis objects filtered by the eind_datum column
 * @method     ChildVoorlopigeHechtenis[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VoorlopigeHechtenisQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumJenv\Base\VoorlopigeHechtenisQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumJenv\\VoorlopigeHechtenis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVoorlopigeHechtenisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVoorlopigeHechtenisQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVoorlopigeHechtenisQuery) {
            return $criteria;
        }
        $query = new ChildVoorlopigeHechtenisQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildVoorlopigeHechtenis|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VoorlopigeHechtenisTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VoorlopigeHechtenisTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVoorlopigeHechtenis A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, persoon_id, in_voorlopige_hechtenis, eind_datum FROM voorlopige_hechtenis WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildVoorlopigeHechtenis $obj */
            $obj = new ChildVoorlopigeHechtenis();
            $obj->hydrate($row);
            VoorlopigeHechtenisTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildVoorlopigeHechtenis|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the persoon_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersoonId(1234); // WHERE persoon_id = 1234
     * $query->filterByPersoonId(array(12, 34)); // WHERE persoon_id IN (12, 34)
     * $query->filterByPersoonId(array('min' => 12)); // WHERE persoon_id > 12
     * </code>
     *
     * @see       filterByPersoon()
     *
     * @param     mixed $persoonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterByPersoonId($persoonId = null, $comparison = null)
    {
        if (is_array($persoonId)) {
            $useMinMax = false;
            if (isset($persoonId['min'])) {
                $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_PERSOON_ID, $persoonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persoonId['max'])) {
                $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_PERSOON_ID, $persoonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_PERSOON_ID, $persoonId, $comparison);
    }

    /**
     * Filter the query on the in_voorlopige_hechtenis column
     *
     * Example usage:
     * <code>
     * $query->filterByInVoorlopigeHechtenis(true); // WHERE in_voorlopige_hechtenis = true
     * $query->filterByInVoorlopigeHechtenis('yes'); // WHERE in_voorlopige_hechtenis = true
     * </code>
     *
     * @param     boolean|string $inVoorlopigeHechtenis The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterByInVoorlopigeHechtenis($inVoorlopigeHechtenis = null, $comparison = null)
    {
        if (is_string($inVoorlopigeHechtenis)) {
            $inVoorlopigeHechtenis = in_array(strtolower($inVoorlopigeHechtenis), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_IN_VOORLOPIGE_HECHTENIS, $inVoorlopigeHechtenis, $comparison);
    }

    /**
     * Filter the query on the eind_datum column
     *
     * Example usage:
     * <code>
     * $query->filterByEindDatum('2011-03-14'); // WHERE eind_datum = '2011-03-14'
     * $query->filterByEindDatum('now'); // WHERE eind_datum = '2011-03-14'
     * $query->filterByEindDatum(array('max' => 'yesterday')); // WHERE eind_datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $eindDatum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterByEindDatum($eindDatum = null, $comparison = null)
    {
        if (is_array($eindDatum)) {
            $useMinMax = false;
            if (isset($eindDatum['min'])) {
                $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_EIND_DATUM, $eindDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eindDatum['max'])) {
                $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_EIND_DATUM, $eindDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_EIND_DATUM, $eindDatum, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumJenv\Persoon object
     *
     * @param \Model\Custom\NovumJenv\Persoon|ObjectCollection $persoon The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function filterByPersoon($persoon, $comparison = null)
    {
        if ($persoon instanceof \Model\Custom\NovumJenv\Persoon) {
            return $this
                ->addUsingAlias(VoorlopigeHechtenisTableMap::COL_PERSOON_ID, $persoon->getId(), $comparison);
        } elseif ($persoon instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VoorlopigeHechtenisTableMap::COL_PERSOON_ID, $persoon->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersoon() only accepts arguments of type \Model\Custom\NovumJenv\Persoon or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Persoon relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function joinPersoon($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Persoon');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Persoon');
        }

        return $this;
    }

    /**
     * Use the Persoon relation Persoon object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumJenv\PersoonQuery A secondary query class using the current class as primary query
     */
    public function usePersoonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersoon($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persoon', '\Model\Custom\NovumJenv\PersoonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVoorlopigeHechtenis $voorlopigeHechtenis Object to remove from the list of results
     *
     * @return $this|ChildVoorlopigeHechtenisQuery The current query, for fluid interface
     */
    public function prune($voorlopigeHechtenis = null)
    {
        if ($voorlopigeHechtenis) {
            $this->addUsingAlias(VoorlopigeHechtenisTableMap::COL_ID, $voorlopigeHechtenis->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the voorlopige_hechtenis table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VoorlopigeHechtenisTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VoorlopigeHechtenisTableMap::clearInstancePool();
            VoorlopigeHechtenisTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VoorlopigeHechtenisTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VoorlopigeHechtenisTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VoorlopigeHechtenisTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VoorlopigeHechtenisTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VoorlopigeHechtenisQuery
